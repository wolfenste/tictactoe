<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Player;
use TicTacToe\Mark;

class PlayerTest extends PHPUnit\Framework\TestCase {
    public function test_player_construction () {
	$playerX = new Player (new Mark (Mark::SYMBOL_X));
    }
}

