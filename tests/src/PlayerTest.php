<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Player;
use TicTacToe\Mark;
use TicTacToe\Map;

class PlayerTest extends BaseClassTest {

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

