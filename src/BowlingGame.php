<?php

class BowlingGame
{
    
    protected $rolls = [];
    
    public function roll($pins) {
        
        if ($pins < 0) {
            throw new InvalidArgumentException('Rolls must be positive');
        }
        
        $this->rolls[] = $pins;
    }
    
    public function score() {
        $score = 0;
        $roll = 0;
        
        for ($frame = 1; $frame <= 10; $frame++) {
            
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll++;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            }
            
            else {
            $score += $this->getDefaultFrameScore($roll);
            $roll += 2;
            }
            
        }
        return $score;
    }
    
    
    protected function isSpare($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll+1] == 10;
    }
    
    protected function isStrike($roll) {
        return $this->rolls[$roll] == 10;
    }
    
    public function getDefaultFrameScore($roll) {
       return $this->rolls[$roll] + $this->rolls[$roll+1];
    }
    
    protected function strikeBonus($roll) {
        return $this->rolls[$roll+1] + $this->rolls[$roll+2];
    }
    
    protected function spareBonus($roll) {
        return $this->rolls[$roll+2];
    }
}
