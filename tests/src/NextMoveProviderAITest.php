<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderAI;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;
use TicTacToe\Mark;

class NextMoveProviderAITest extends BaseClassTest {
    /**
     * @test
     */
    public function ai_strategy_is_constructed_with_symbol_x_and_an_empty_map () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderAI (new Mark (Mark::SYMBOL_X), $map);
        
        $this->assertTrue (is_object ($strategy));
        $this->assertTrue ($strategy instanceof NextMoveProvider);
        $this->assertTrue ($strategy->getMyMark ()->equal (new Mark (Mark::SYMBOL_X)));
        $this->assertTrue ($map->isEmpty ());
    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage SYMBOL_NONE Mark objects aren't allowed.
     */
    public function ai_strategy_is_constructed_with_a_wrong_symbol () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderAI (new Mark (Mark::SYMBOL_NONE), $map);
    }

    /**
     * @test
     */
    public function ai_next_move_is_a_valid_mapcoordinate_object () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderAI (
            new Mark (Mark::SYMBOL_X),
            $map,
            (NextMoveProviderAI::class)::STR_FIRST_POS,
            false
        );

        $this->assertTrue ($strategy->getNextMove () instanceof MapCoordinate);
    }

    /**
     * @test
     */
    public function the_player_having_this_strategy_waits_this_round () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderAI (
            new Mark (Mark::SYMBOL_X),
            $map,
            (NextMoveProviderAI::class)::STR_FIRST_POS
        );

        $this->assertNull ($strategy->getNextMove ());
    }
}
