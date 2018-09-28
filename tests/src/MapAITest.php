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
        
        $this->assertTrue (($map->getMarks () [0])->equal (new Mark (Mark::SYMBOL_X)));
        $map->erase (new MapCoordinate (1, 1));
        $this->assertTrue (($map->getMarks () [0])->equal (new Mark (Mark::SYMBOL_NONE)));
    }

    /**
     * @test
     */
    public function only_available_moves_are_available () {
        $map = new MapAI ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_X),
            6 => new Mark (Mark::SYMBOL_0),
            8 => new Mark (Mark::SYMBOL_X)
        )));

        $availableMoves = $map->getAvailableMoves ();

        foreach ($map->getMarks () as $index => $mark) {
            if (array_key_exists ($index, $availableMoves)) {
                $this->assertTrue ($mark->equal (new Mark (Mark::SYMBOL_NONE)));
            } else {
                $this->assertFalse ($mark->equal (new Mark (Mark::SYMBOL_NONE)));
            }
        }
    }
}
