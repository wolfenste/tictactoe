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
        $strategyX = new NextMoveProviderPLayer ($map, $option);
        $strategy0 = new NextMoveProviderPlayer ($map, $option);
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
        $strategyX = new NextMoveProviderPlayer ($map, $option);
        $strategy0 = new NextMoveProviderAI ($map);
        $game = new Game ($strategyX, $strategy0, $map);
        $this->assertTrue ($map->isMapAvailable (4));
        $game->getPlayerX ()->putMark ();
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($map->getMarks () [4]));
    }
}

