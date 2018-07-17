<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Map;
use TicTacToe\Player;
use TicTacToe\Game;

class TicTacToeTest extends TestCase {
    /**
     * @test
     */
    public function start_the_game_with_an_empty_map_the_current_player_being_x () {
        $map = new Map ();
        $player = new Player ();
	$game = new Game ($player, $map);

	$this->assertEquals ('X', $game->getCurrentPlayer ());
	$this->assertEquals ('X', $game->getPlayer ()->getName ());
	$this->assertTrue ($game->getMap ()->isEmpty ());
    }
}

