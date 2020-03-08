<?php
use PHPUnit\Framework\TestCase;

class Demo extends TestCase
{
    public function testMas()
    {
        $mas = [];
        $this->assertSame(0, count($mas));

        array_push($mas, "one");

        $this->assertSame("one", $mas[0]);

        $this->assertSame("one", array_pop($mas));
        $this->assertSame(0,count($mas));
    }


}