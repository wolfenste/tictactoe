<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderAI;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;
use TicTacToe\Mark;

class ConcreteNextMoveProviderAI extends NextMoveProviderAI {
    public function getNextMove () : MapCoordinate {
        return new MapCoordinate (1, 1);
    }
}

class NextMoveProviderAITest extends BaseClassTest {
    /**
     * @test
     */
    public function ai_strategy_is_constructed_with_symbol_x_and_an_empty_map () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new ConcreteNextMoveProviderAI (new Mark (Mark::SYMBOL_X), $map);
        
        $this->assertTrue ($strategy->getMyMark ()->equal (new Mark (Mark::SYMBOL_X)));

    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage SYMBOL_NONE Mark objects aren't allowed.
     */
    public function ai_strategy_is_constructed_with_a_wrong_symbol () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new ConcreteNextMoveProviderAI (new Mark (Mark::SYMBOL_NONE), $map);
    }
}
