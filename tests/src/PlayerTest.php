<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Player;
use TicTacToe\Mark;

class PlayerTest extends PHPUnit\Framework\TestCase {
    public function test_player_construction_with_symbol_x () {
	    $playerX = new Player (new Mark (Mark::SYMBOL_X));
	$this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($playerX->getPlayerName ()));
    }
}

