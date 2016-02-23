<?php

class RomanNumeralsConverter
{
    
    protected static $lookup = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];
    
    public function convert($number) {
        
        if ($number == 0) {
            throw new Exception('Cannot convert 0');
        }
        
        $solution = '';
        
        foreach (static::$lookup as $limit => $glyph) {
            while ($number >= $limit) {
                $solution .= $glyph;
                $number -= $limit;
            }
        }
        
        return $solution;
    }
    
}
