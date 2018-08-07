<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\GameStatus;

class GameStatusTest extends TestCase {
    /**
     * @test
     */
    public function game_status_is_constructed_with_value_status_start () {
	$gameStatus = new GameStatus (GameStatus::STATUS_START);
	$this->assertTrue (
	    (new GameStatus (GameStatus::STATUS_START))->equals ($gameStatus)
        );
    }
}
