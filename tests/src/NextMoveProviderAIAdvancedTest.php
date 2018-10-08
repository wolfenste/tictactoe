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

   /**
    * @test
    */
    public function ai_blocks_the_opponent_s_winning_move () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            1 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_0),
            5 => new Mark (Mark::SYMBOL_X),
            6 => new Mark (Mark::SYMBOL_X),
            7 => new Mark (Mark::SYMBOL_0)
        )));
        $strategy = new NextMoveProviderAIAdvanced (
            new Mark (Mark::SYMBOL_0),
            $map
        );

        $this->assertTrue ($strategy->getNextMove ()->equal (new MapCoordinate (1, 3)));
    }

   /**
    * @test
    */
    public function new_scenario_ai_still_blocks_the_opponent_s_winning_move () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_0),
            1 => new Mark (Mark::SYMBOL_X),
            2 => new Mark (Mark::SYMBOL_0),
            3 => new Mark (Mark::SYMBOL_X),
            4 => new Mark (Mark::SYMBOL_X),
            6 => new Mark (Mark::SYMBOL_X),
            7 => new Mark (Mark::SYMBOL_0)
        )));
        $strategy = new NextMoveProviderAIAdvanced (
            new Mark (Mark::SYMBOL_0),
            $map
        );

        $this->assertTrue ($strategy->getNextMove ()->equal (new MapCoordinate (2, 3)));
    }

   /**
    * @test
    */
    public function ai_chooses_the_winning_move () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            2 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_0),
            6 => new Mark (Mark::SYMBOL_X),
            0 => new Mark (Mark::SYMBOL_0)
        )));
        $strategy = new NextMoveProviderAIAdvanced (
            new Mark (Mark::SYMBOL_0),
            $map
        );

        $this->assertTrue ($strategy->getNextMove ()->equal (new MapCoordinate (2, 3)));
    }
}

