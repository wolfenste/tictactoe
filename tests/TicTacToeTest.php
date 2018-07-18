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
	$playerX = new Player ();
	$player0 = new Player ();
	$game = new Game ($playerX, $player0, $map);

	$this->assertTrue (new Mark ('X')->equals ($game->getCurrentMark ()));
	$this->assertTrue ($game->isMapEmpty ());
    }
}

