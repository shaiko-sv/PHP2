<?php
use PHPUnit\Framework\TestCase;

class Demo2 extends TestCase
{

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $sum = $a + $b;
        $this->assertSame($expected, $sum);
    }


    public function additionProvider()
    {
        return [
            [1, 1, 2],
            [-2, -3, -5],
            [0, 0, 0]
        ];
    }
}
