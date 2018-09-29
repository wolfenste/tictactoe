<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;
use TicTacToe\Mark;

class NextMoveProviderPlayerTest extends BaseClassTest {
    /**
     * @test
     */
    public function player_strategy_is_constructed_with_an_empty_map_and_null_option () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map);
        
        $this->assertTrue (is_object ($strategy));
        $this->assertTrue ($strategy instanceof NextMoveProvider);
        $this->assertNull ($strategy->getNextMove ());
        $this->assertTrue ($map->isEmpty ());
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function player_strategy_is_constructed_with_an_unexpected_option () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $this);
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function player_made_an_unavailable_choice () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X)
        )));
        $option = new MapCoordinate (MapCoordinate::ONE, MapCoordinate::ONE);
        $strategy = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $option);
    }

    /**
     * @test
     */
    public function my_mark_is_symbol_x () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map);

        $this->assertTrue ($strategy->getMyMark ()->equal (new Mark (Mark::SYMBOL_X)));
    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage SYMBOL_NONE Mark objects aren't allowed.
     */
    public function player_strategy_is_constructed_with_a_wrong_mark () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_NONE), $map);
    }
}
