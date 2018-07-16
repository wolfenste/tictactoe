<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Map;
use TicTacToe\Player;
use TicTacToe\Game;

class TicTacToeTest extends TestCase {
    /**
     * @test
     */
    public function testStartTheGameWithAnEmptyMapTheCurrentPlayerBeingX () {
        $map = new Map ();
        $player = new Player ();
	$game = new Game ($player, $map);

	$this->assertEquals ('X', $game->getCurrentPlayer ());
	$this->assertEquals ('X', $game->getPlayer ()->getName ());
	$this->assertTrue ($game->getMap ()->isEmpty ());
    }
}

