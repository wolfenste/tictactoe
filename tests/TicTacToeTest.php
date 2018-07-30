<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\GameStatus;
use TicTacToe\MapCoordinate;
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
	$game = new Game ($playerX, $player0, $map);
	
	$this->assertTrue (new GameStatus ('start')->equals ($game->getGameStatus ()));
	$this->assertTrue ($game->isMapEmpty ());
	$this->assertSame (new Player (new Mark ('')), $game->getWhoWon ());
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
	$game = new Game ($playerX, $player0, $map);
        
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$playerX->putMark (new MapCoordinate (2, 2));
	$player0->putMark (new MapCoordiate (3, 1));
	$this->assertTrue (new GameStatus ('in_progress')->equals ($game->getGameStatus ()));
	$playerX->putMark (new MapCoordinate (2, 3));
	$this->assertTrue ($game->isMapCompleted ());
	$this->assertTrue (new GameStatus ('end')->equals ($game->getGameStatus ()));
	$this->assertSame (new Player (new Mark ('')), $game->getWhoWon ());
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

	$playerX->putMark (new MapCoordinate (1, 1));
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$playerX->putMark (new MapCoordinate (1, 2));
	$player0->putMark (new MapCoordinate (2, 2));
	$playerX->putMark (new MapCoordinate (1, 3));
        $this->assertSame ($playerX, $game->getWhoWon ());
	$this->assertTrue (new GameStatus ('end')->equals ($game->getGameStatus ()));
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
        
	$playerX->putMark (new MapCoordinate (1, 1));
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (3, 3));
	$playerX->putMark (new MapCoordinate (2, 2));
	$player0->putMark (new MapCoordinate (1, 3));
	$playerX->putMark (new MapCoordinate (3, 1));
	$player0->putMark (new MapCoordinate (2, 3));
	$this->assertSame ($player0, $game->getWhoWon ());
	$this->assertTrue (new GameStatus ('end')->equals ($game->getGameStatus ()));
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
	
	$player->putMark (new MapCoordinate (1, 2));
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$this->assertFalse ($game->isMapCompleted ());
	$this->assertTrue (new GameStatus ('in_progress')->equals ($game->getGameStatus ()));
	$this->assertSame (new Player (new Mark ('')), $game->getWhoWon ());
    }

}

