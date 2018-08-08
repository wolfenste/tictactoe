<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Mark;

class MarkTest extends BaseClassTest {
    /**
     * @test
     */
    public function mark_is_constructed_with_value_none () {
	$mark = new Mark (Mark::SYMBOL_NONE);
	$this->assertTrue ((new Mark (Mark::SYMBOL_NONE))->equal ($mark));
    }
}
