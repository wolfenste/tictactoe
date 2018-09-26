<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\NextMoveProviderAI;
use TicTacToe\MapCoordinate;
use TicTacToe\Mark;
use TicTacToe\Map;
use TicTacToe\Game;

class PlayerTest extends BaseClassTest {
    /**
     * @test
     */
    public function testing_player_construction () {
        $map = new Map ($this->createEmptyTableSpec ());
        $option = null;
        $strategyX = new NextMoveProviderPLayer (new Mark (Mark::SYMBOL_X), $map, $option);
        $strategy0 = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_0), $map, $option);
        $game = new Game ($strategyX, $strategy0, $map);
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($game->getPlayerX ()->getPlayerName ()));
        $this->assertTrue ((new Mark (Mark::SYMBOL_0))->equal ($game->getPlayer0 ()->getPlayerName ()));
    }

    /**
     * @test
     */
    public function player_x_puts_mark_at_mapcoordinate_2_2 () {
        $map = new Map ($this->createEmptyTableSpec ());
        $option = new MapCoordinate (MapCoordinate::TWO, MapCoordinate::TWO);
        $strategyX = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $option);
        $strategy0 = new NextMoveProviderAI (new Mark (Mark::SYMBOL_0), $map);
        $game = new Game ($strategyX, $strategy0, $map);
        $this->assertTrue ($map->isMapAvailable ($option));
        $game->getPlayerX ()->putMark ();
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($map->getMarks () [4]));
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage The current player did not execute a move.
     */
    public function player_x_did_not_execute_a_move () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategyX = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map);
        $strategy0 = new NextMoveProviderAI (new Mark (Mark::SYMBOL_0), $map);
        $game = new Game ($strategyX, $strategy0, $map);
        $position = $game->getPlayerX ()->getStrategyPosition ();
    }
}

