<?php

use PHPUnit\Framework\TestCase;

class 	HelloWorldTest extends TestCase {
    public function testHello () {
        $this->expectOutputString ('hello, world');
        echo 'hello, world';
    }
}
