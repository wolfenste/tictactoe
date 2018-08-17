<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\StrategyPlayer;
use TicTacToe\StrategyAI;
use TicTacToe\GameStatus;
use TicTacToe\MapCoordinate;
use TicTacToe\Mark;
use TicTacToe\Map;
use TicTacToe\Player;
use TicTacToe\Game;

class TicTacToeTest extends BaseClassTest {
    /**
     * @test
     */
    public function start_the_game_with_an_empty_map_the_current_player_being_x () {
        $strategyX = new StrategyPlayer ();
        $strategy0 = new StrategyAI ();
	    $map = new Map ($this->createEmptyTableSpec ());
	    $game = new Game ($strategyX, $strategy0, $map);
	
	    $this->assertTrue ((new GameStatus (GameStatus::STATUS_START))->equals 
            ($game->getGameStatus ()));
	    $this->assertTrue ($game->isMapEmpty ());
	    $this->assertEquals (null, $game->getWhoWon ());
    }

    /**
     * @test
     */
    public function the_map_is_completed_no_winner () {
        $strategyX = new StrategyPlayer ();
        $strategy0 = new StrategyAI ();
	    $marks = $this->createEmptyTableSpec (array (
	        0 => new Mark (Mark::SYMBOL_X),
	        1 => new Mark (Mark::SYMBOL_0),
            2 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_X),
            5 => new Mark (Mark::SYMBOL_0),
            6 => new Mark (Mark::SYMBOL_X),
	        7 => new Mark (Mark::SYMBOL_X),
	        8 => new Mark (Mark::SYMBOL_0)
	    ));
	    $map = new Map ($marks);
	    $game = new Game ($strategyX, $strategy0, $map);
        
	    $this->assertFalse ($game->isMapEmpty ());
	    $this->assertTrue ($game->isMapCompleted ());
	    $this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals 
            ($game->getGameStatus ()));
	    $this->assertEquals (null, $game->getWhoWon ());
    }

    /**
     * @test
     */
    public function player_x_won_the_game () {
        $strategyX = new StrategyPlayer ();
        $strategy0 = new StrategyAI ();
        $marks = $this->createEmptyTableSpec ( array (
            0 => new Mark (Mark::SYMBOL_X),
            1 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_0),
        ));
        $map = new Map ($marks);
	    $game = new Game ($strategyX, $strategy0, $map);

	    $this->assertFalse ($game->isMapEmpty ());
	    $game->getCurrentPlayer ()->putMark (new MapCoordinate (1, 3));
        $this->assertSame ($game->getPlayerX (), $game->getWhoWon ());
	    $this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals 
            ($game->getGameStatus ()));
    }

    /**
     * @test
     */
    public function player_0_won_the_game () {
        $strategyX = new StrategyPlayer ();
        $strategy0 = new StrategyAI ();
        $marks = $this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            2 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_X),
            6 => new Mark (Mark::SYMBOL_X),
            8 => new Mark (Mark::SYMBOL_0),
        ));
	    $map = new Map ($marks);
	    $game = new Game ($playerX, $player0, $map);
        
	    $this->assertFalse ($game->isMapEmpty ());
	    $game->getCurrentPlayer ()->putMark (new MapCoordinate (2, 3));
	    $this->assertSame ($game->getPlayer0 (), $game->getWhoWon ());
	    $this->assertTrue ((new GameStatus (GameStatus::STATUS_END))->equals 
            ($game->getGameStatus ()));
    }

    /**
     * @test
     */
    public function no_winners_still_playing_prepare_next_move () {
        $strategyX = new StrategyPlayer ();
        $strategy0 = new StrategyAI ();
	    $map = new Map ($this->createEmptyTableSpec ());
	    $game = new Game ($strategyX, $strategy0, $map);
	
	    $game->getCurrentPlayer ()->putMark (new MapCoordinate (1, 2));
	    $this->assertFalse ($game->isMapEmpty ());
	    $this->assertFalse ($game->isMapCompleted ());
	    $this->assertTrue ((new GameStatus (GameStatus::STATUS_IN_PROGRESS))->equals 
            ($game->getGameStatus ()));
	    $this->assertEquals (null, $game->getWhoWon ());
    }

}

