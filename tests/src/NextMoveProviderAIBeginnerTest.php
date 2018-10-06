<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderAIBeginner;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;
use TicTacToe\Mark;

class NextMoveProviderAIBeginnerTest extends BaseClassTest {
    /**
     * @test
     */
    public function ai_next_move_is_mapcoordinate_1_3 () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            1 => new Mark (Mark::SYMBOL_0),
        )));
        $strategy = new NextMoveProviderAIBeginner (
            new Mark (Mark::SYMBOL_X),
            $map
        );

        $this->assertTrue ($strategy->getNextMove ()->equal (new MapCoordinate (1, 3)));
    }
}

