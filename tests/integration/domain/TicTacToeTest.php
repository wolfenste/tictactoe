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
     * Creates a parameter for Map's constructor
     *
     * @param array $overrides, by default is empty. Keys: integers between 0 and 8
     *     Values: Mark objects
     * @return an array of 9 Mark objects
     */
    private function createEmptyTableSpec ($overrides = []) {
	$arrayOfMarkObjects = array ();
        for ($i = 0; $i < 9; $i++) {
	    if (array_key_exists ($i, $overrides)) {
		$arrayOfMarkObjects [$i] = $overrides [$i];
            } else {
		$arrayOfMarkObjects [$i] = new Mark (Mark::SYMBOL_NONE);
	    }
	}
	return $arrayOfMarkObjects;
    }

    /**
     * @test
     */
    public function start_the_game_with_an_empty_map_the_current_player_being_x () {
	$playerX = new Player (new Mark (Mark::SYMBOL_X));
	$player0 = new Player (new Mark (Mark::SYMBOL_0));
	$marks = $this->createEmptyTableSpec ();
	$map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);
	
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_START))->equals ($game->getGameStatus ()));
	$this->assertTrue ($game->isMapEmpty ());
	$this->assertEquals (null, $game->getWhoWon ());
    }

    /**
     * @test
     */
    public function the_map_is_completed_no_winner () {
	$playerX = new Player (new Mark (Mark::SYMBOL_X));
	$player0 = new Player (new Mark (Mark::SYMBOL_0));
	$marks = $this->createEmptyTableSpec (array (
	    0 => new Mark (Mark::SYMBOL_X),
	    1 => new Mark (Mark::SYMBOL_0),
	    2 => new Mark (Mark::SYMBOL_X),
	    7 => new Mark (Mark::SYMBOL_X),
	    8 => new Mark (Mark::SYMBOL_0)
	));
	$map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);
        
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$playerX->putMark (new MapCoordinate (2, 2));
	$player0->putMark (new MapCoordiate (3, 1));
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_IN_PROGRESS))->equals ($game->getGameStatus ()));
	$playerX->putMark (new MapCoordinate (2, 3));
	$this->assertTrue ($game->isMapCompleted ());
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals ($game->getGameStatus ()));
	$this->assertEquals (null, $game->getWhoWon ());
    }

    /**
     * @test
     */
    public function player_x_won_the_game () {
        $playerX = new Player (new Mark (Mark::SYMBOL_X));
	$player0 = new Player (new Mark (Mark::SYMBOL_0));
	$marks = $this->createEmptyTableSpec ();
        $map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);

	$playerX->putMark (new MapCoordinate (1, 1));
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$playerX->putMark (new MapCoordinate (1, 2));
	$player0->putMark (new MapCoordinate (2, 2));
	$playerX->putMark (new MapCoordinate (1, 3));
        $this->assertSame ($playerX, $game->getWhoWon ());
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals ($game->getGameStatus ()));
    }

    /**
     * @test
     */
    public function player_0_won_the_game () {
	$playerX = new Player (new Mark (Mark::SYMBOL_X));
	$player0 = new Player (new Mark (Mark::SYMBOL_0));
	$marks = $this->createEmptyTableSpec ();
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
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals ($game->getGameStatus ()));
    }

    /**
     * @test
     */
    public function no_winners_still_playing_prepare_next_move () {
	$playerX = new Player (new Mark (Mark::SYMBOL_X));
	$player0 = new Player (new Mark (Mark::SYMBOL_0));
	$marks = $this->createEmptyTableSpec ();
	$map = new Map ($marks);
	$game = new Game ($playerX, $player0, $map);
	
	$player->putMark (new MapCoordinate (1, 2));
	$this->assertFalse ($game->isMapEmpty ());
	$player0->putMark (new MapCoordinate (2, 1));
	$this->assertFalse ($game->isMapCompleted ());
	$this->assertTrue ((new GameStatus (GameStatus::STATUS_IN_PROGRESS))->equals ($game->getGameStatus ()));
	$this->assertEquals (null, $game->getWhoWon ());
    }

}

