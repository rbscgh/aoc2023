<?php

use PHPUnit\Framework\TestCase;

class DayOneTest extends TestCase {

    public function testOne() {
        $arr = file("testinput/dayone.txt");
        $o = new DayOne();
        $actual = $o->problemOne($arr);
        $this->assertSame(142, $actual);
    }

    public function testTwo() {
        $arr = file("testinput/dayone_part_two.txt");
        $o = new DayOne(); 
        $actual = $o->problemTwo($arr);
        $this->assertSame(281, $actual);
    }
}
