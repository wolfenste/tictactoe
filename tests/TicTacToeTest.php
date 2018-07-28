<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Mark;
use TicTacToe\Map;
use TicTacToe\Player;
use TicTacToe\Game;

class TicTacToeTest extends TestCase {
    /**
     * @test
     */
    public function start_the_game_with_an_empty_map_the_current_player_being_x () {
	$playerX = new Player (new Mark ('X'));
	$player0 = new Player (new Mark ('0'));
	$marks = array (
		'(1, 1)' => '', '(1, 2)' => '', '(1, 3)' => '',
		'(2, 1)' => '', '(2, 2)' => '', '(2, 3)' => '',
		'(3, 1)' => '', '(3, 2)' => '', '(3, 3)' => ''
	);
	$map = new Map ($marks);
	$game = new Game ($playerX, $playerY, $map);
	
	$this->assertEquals ($game->getGameStatus (), 'start');
	$this->assertTrue ($game->isMapEmpty ());
	$this->assertEquals ($game->getWhoWon (), '');
    }

    /**
     * @test
     */
    public function the_map_is_completed_no_winner () {
	$playerX = new Player (new Mark ('X'));
	$player0 = new Player (new Mark ('0'));
	$marks = array (
		'(1, 1)' => 'X', '(1, 2)' => '0', '(1, 3)' => 'X',
		'(2, 1)' => '', '(2, 2)' => '', '(2, 3)' => '',
		'(3, 1)' => '', '(3, 2)' => 'X', '(3, 3)' => '0'
	);
	$map = new Map ($marks);
	$game = new Game ($playerX, $playerY, $map);
        
	$this->assertFalse ($game->isMapEmpty ());
	$player0->moveToSquare (2, 1);
	$playerX->moveToSquare (2, 2);
	$player0->moveToPlayer (3, 1);
	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$playerX->moveToSquare (2, 3);
	$this->assertTrue ($game->isMapCompleted ());
	$this->assertEquals ($game->getGameStatus (), 'end');
	$this->assertEquals ($game->getWhoWon (), '');
    }

    /**
     * @test
     */
    public function player_x_won_the_game () {
        $playerX = new Player (new Mark ('X'));
	$player0 = new Player (new Mark ('0'));
	$marks = array (
		'(1, 1)' => '', '(1, 2)' => '', '(1, 3)' => '',
		'(2, 1)' => '', '(2, 2)' => '', '(2, 3)' => '',
		'(3, 1)' => '', '(3, 2)' => '', '(3, 3)' => ''
	);
        $map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);

	$playerX->moveToSquare (1, 1);
	$this->assertFalse ($game->isMapEmpty ());
	$player0->moveToSquare (2, 1);
	$playerX->moveToSquare (1, 2);
	$player0->moveToSquare (2, 2);
	$playerX->moveToSquare (1, 3);
        $this->assertEquals ($game->getWhoWon (), 'playerX');
	$this->assertEquals ($game->getGameStatus (), 'end');
    }

    /**
     * @test
     */
    public function player_0_won_the_game () {
	$playerX = new Player (new Mark ('X'));
	$player0 = new Player (new Mark ('0'));
	$marks = array (
		'(1, 1)' => '', '(1, 2)' => '', '(1, 3)' => '',
		'(2, 1)' => '', '(2, 2)' => '', '(2, 3)' => '',
		'(3, 1)' => '', '(3, 2)' => '', '(3, 3)' => ''
	);
	$map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);
        
	$playerX->moveToSquare (1, 1);
	$this->assertFalse ($game->isMapEmpty ());
	$player0->moveToSquare (3, 3);
	$playerX->moveToSquare (2, 2);
	$player0->moveToSquare (1, 3);
	$playerX->moveToSquare (3, 1);
	$player0->moveToSquare (2, 3);
	$this->assertEquals ($game->getWhoWon (), 'player0');
	$this->assertEquals ($game->getGameStatus (), 'end');
    }

    /**
     * @test
     */
    public function no_winners_still_playing_prepare_next_move () {
	$playerX = new Player (new Mark ('X'));
	$player0 = new Player (new Mark ('0'));
	$marks = array (
		'(1, 1)' => '', '(1, 2)' => '', '(1, 3)' => '',
		'(2, 1)' => '', '(2, 2)' => '', '(2, 3)' => '',
		'(3, 1)' => '', '(3, 2)' => '', '(3, 3)' => ''
	);
	$map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);
	
	$player->moveToSquare (1, 2);
	$this->assertFalse ($game->isMapEmpty ());
	$player0->moveToSquare (2, 1);
	$this->assertFalse ($game->isMapCompleted ());
	$this->assertEquals ($game->getGameStatus (), 'in_progress');
	$this->assertEquals ($game->getWhoWon (), '');
    }

}

