<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Mark;
use TicTacToe\Square;
use TicTacToe\Map;
use TicTacToe\Player;
use TicTacToe\Game;

class TicTacToeTest extends TestCase {
    /**
     * @test
     */
    public function start_the_game_with_an_empty_map_the_current_player_being_x () {
	$mark = new Mark ('X');
	$square = null; // no input at this moment
        $map = new Map ($marks); // initial values
	$playerX = new Player ('X', $linesX);
	$player0 = new Player ('0', $lines0);
	$game = new Game ($playerX, $player0, $map, $square, $mark);

	$this->assertTrue (new Mark ('X')->equals ($game->getCurrentMark ()));
	$this->assertTrue ($game->isMapEmpty ());

	$this->assertEquals ($game->getGameStatus (), 'start');
	$this->assertEquals ($game->getWhoWon (), '');
	$game->playGame ();
	$this->assertEquals ($game->getWhoWon (), '');
	$this->assertFalse ($game->isMapCompleted ());
	$this->assertEquals ($game->getGameStatus (), 'start');
    }

    /**
     * @test
     */
    public function the_map_is_completed_no_winner () {
	$mark = new Mark ($currentMark);
	$square = new Square ($x, $y, $mark);
        $map = new Map ($marks);
	$playerX = new Player ('X', $linesX);
	$player0 = new Player ('0', $lines0);
	$game = new Game ($playerX, $player0, $map, $square, $mark);

	$this->assertFalse ($game->isMapEmpty ());

	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$this->assertEquals ($game->getWhoWon (), '');
	$game->playGame ();
	$this->assertEquals ($game->getWhoWon (), '');
	$this->assertTrue ($game->isMapCompleted ());
	$this->assertEquals ($game->getGameStatus (), 'end');
    }

    /**
     * @test
     */
    public function player_x_won_the_game () {
	$mark = new Mark ('X');
	$square = new Square ($x, $y, $mark);
	$map = new Map ($marks);
	$playerX = new Player ('X', $linesX);
	$player0 = new Player ('0', $lines0);
	$game = new Game ($playerX, $player0, $map, $square, $mark);
	
	$this->assertTrue (new Mark ('X')->equals ($game->getCurrentMark ()));
	$this->assertFalse ($game->isMapEmpty ());

	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$this->assertEquals ($game->getWhoWon (), '');
	$game->playGame ();
	$game->assertEquals ($game->getWhoWon (), 'player_x');
	$this->assertEquals ($game->getGameStatus (), 'end');
    }

    /**
     * @test
     */
    public function player_0_won_the_game () {
	$mark = new Mark ('0');
	$square = new Square ($x, $y, $mark);
	$map = new Map ($marks);
	$playerX = new Player ('X', $linesX);
	$player0 = new Player ('0', $lines0);
	$game = new Game ($playerX, $player0, $map, $square, $mark);

	$this->assertTrue (new Mark ('0')->equals ($game->getCurrentMark ()));
	$this->assertFalse ($game->isMapEmpty ());

	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$this->assertEquals ($game->getWhoWon (), '');
	$game->playGame ();
	$this->assertEquals ($game->getWhoWon (), 'player_0');
	$this->assertEquals ($game->getGameStatus (), 'end');
    }

    /**
     * @test
     */
    public function no_winners_still_playing_prepare_next_move () {
	$mark = new Mark ($currentMark);
	$square = new Square ($x, $y, $mark);
	$map = new Map ($marks);
	$playerX = new Player ('X', $linesX);
	$player0 = new Player ('0', $lines0);
	$game = new Game ($playerX, $player0, $map, $square, $mark);

	$this->assertFalse ($game->isMapEmpty ());

	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$this->assertEquals ($game->getWhoWon (), '');
	$game->playGame ();
	$game->assertEquals ($game->getWhoWon (), '');
	$this->assertFalse ($game->isMapCompleted ());
	$this->assertEquals ($game->getGameStatus (), 'in_progress');
    }
}

