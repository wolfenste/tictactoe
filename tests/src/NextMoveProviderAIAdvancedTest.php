<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderAIAdvanced;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;
use TicTacToe\Mark;

class NextMoveProviderAIAdvancedTest extends BaseClassTest {
    /** 
     * @test
     */
    public function ai_next_move_is_a_valid_mapcoordinate_object () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            6 => new Mark (Mark::SYMBOL_0),
            7 => new Mark (Mark::SYMBOL_X)
        )));
        $strategy = new NextMoveProviderAIAdvanced (
            new Mark (Mark::SYMBOL_X),
            $map
        );

        $this->assertTrue ($strategy->getNextMove () instanceof MapCoordinate);
    }   
}

