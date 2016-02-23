<?php

class StringCalculator
{
    
    public function add($numbers) {
        $solution = 0;
        $numbers = $this->parseNumbers($numbers);
        
        foreach ($numbers as $number) {
            if ($number < 0) throw new InvalidArgumentException('Invalid number provided: ' . $number);
            if ($number >= 1000) continue;
            $solution += $number;
        }
        
        return $solution;
   
    }
    
    private function parseNumbers($numbers) {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
    }
    
}
