<?php

class StringHelperCest extends PHPUnit\Framework\TestCase
{
    
    public function testStringLoadAndGet()
    {
        $originals = [
            ['', ''],
            ['str', 'str'],
            ['stR', 'stR'],
            ['sTR', 'sTR'],
            ['STR', 'STR'],
            ['Str', 'Str'],
            [['Str'], 'Str'],
            [['S', 'T', 'R'], 'STR'],
            [['S', ['T', ['R']]], 'STR'],
        ];
        
        foreach ($originals as $original)
        {
            $this->assertInstanceOf(\Zver\StringHelper::class, Str($original));
            $this->assertSame(Str($original[0])->get(), $original[1]);
            $this->assertSame(
                \Zver\StringHelper::make($original[0])
                                  ->get(), $original[1]
            );
        }
    }
    
}