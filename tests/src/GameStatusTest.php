<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\GameStatus;

class GameStatusTest extends BaseClassTest {
    /**
     * @test
     */
    public function game_status_is_constructed_with_value_status_start () {
	$gameStatus = new GameStatus (GameStatus::STATUS_START);
	$this->assertTrue (
	    (new GameStatus (GameStatus::STATUS_START))->equals ($gameStatus)
        );
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function game_status_is_constructed_with_unexpected_value () {
	$this->expectException (InvalidArgumentException::class);
	$gameStatus = new GameStatus ('unexpected_value');
    }
}
