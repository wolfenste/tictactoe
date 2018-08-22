<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\NextMoveProviderAI;
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
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($game->getPlayerX ()));
        $this->assertTrue ((new Mark (Mark::SYMBOL_0))->equal ($game->getPlayer0 ()));
    }

    /**
     * @test
     */
    public function player_x_puts_mark_at_mapcoordinate_2_2 () {
        $playerX = new Player (new Mark (Mark::SYMBOL_0));
        $map = new Map ($this->createEmptyTableSpec ());
        $this->assertTrue ($map->isMapAvailable (5));
        $playerX->putMark (new MapCoordinate (MapCoordinate::TWO, MapCoordinate::TWO));
        $this->assertFalse ($map->isMapAvailable (5));
    }
}

