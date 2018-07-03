<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\HelloWorld;

class 	HelloWorldTest extends TestCase {
    public function testHello () {
        $this->expectOutputString ('hello, world');
	$helloWorld = new HelloWorld ();
	$helloWorld->hello ();
    }
}
