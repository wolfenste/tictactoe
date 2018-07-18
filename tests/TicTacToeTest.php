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

    /**
     * @test
     */
    public function the_map_is_completed_no_winner () {
        $map = new Map ();
	$playerX = new Player ();
	$player0 = new Player ();
	$game = new Game ($playerX, $player0, $map);

	$this->assertTrue ($game->isMapCompleted ());
	$this->assertFalse ($game->playerXWon ());
	$this->assertFalse ($game->player0Won ());
	$this->assertTrue ($game->isGameFinished ());
    }

    /**
     * @test
     */
    public function player_x_won_the_game () {
	$map = new Map ();
	$playerX = new Player ();
	$player0 = new Player ();
	$game = new Game ($playerX, $player0, $map);

	$this->assertTrue ($game->playerXWon ());
	$this->assertFalse ($game->player0Won ());
	$this->assertTrue ($game->isGameFinished ());
    }

    /**
     * @test
     */
    public function player_0_won_the_game () {
	$map = new Map ();
	$playerX = new Player ();
	$player0 = new Player ();
	$game = new Game ($playerX, $player0, $map);

	$this->assertTrue ($game->player0Won ());
	$this->assertFalse ($game->playerXWon ());
	$this->assertTrue ($game->isGameFinished ());
    }

    /**
     * @test
     */
    public function no_winners_still_playing_prepare_next_move () {
	$map = new Map ();
	$playerX = new Player ();
	$player0 = new Player ();
	$game = new Game ($playerX, $player0, $map);

	$this->assertFalse ($game->playerXWon ());
	$this->assertFalse ($game->player0Won ());
	$this->assertFalse ($game->isGameFinished ());
	$this->assertTrue ($game->mapUpdated ());
    }
}

