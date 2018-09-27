<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\MapAI;
use TicTacToe\MapCoordinate;
use TicTacToe\Mark;

class MapAITest extends BaseClassTest {
    /**
     * @test
     */
    public function mark_at_position_1_1_was_successfully_erased () {
        $map = new MapAI ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X)
        )));

        $map->erase (new MapCoordinate (1, 1));
        $this->assertTrue (($map->getMarks () [0])->equal (new Mark (Mark::SYMBOL_NONE)));
    }
}
