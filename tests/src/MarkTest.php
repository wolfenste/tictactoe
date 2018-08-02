<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Mark;

class MarkTest extends PHPUnit\Framework\TestCase {
    /**
     * @test
     */
    public function mark_is_constructed_with_value_none () {
	$mark = new Mark (Mark::SYMBOL_NONE);
	$this->assertEquals ($mark->getValue (), Mark::SYMBOL_NONE);
    }
}
