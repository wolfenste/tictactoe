<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\MapCoordinate;
use TicTacToe\Map;
use TicTacToe\NextMoveProvider;

class NextMoveProviderPlayerTest extends BaseClassTest {
    /**
     * @test
     */
    public function player_strategy_is_constructed_with_an_empty_map_and_null_option () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer ($map);
        
        $this->assertTrue (is_object ($strategy));
        $this->assertTrue ($strategy instanceof NextMoveProvider);
        $this->assertNull ($strategy->getPosition ());
        $this->assertTrue ($map->isEmpty ());
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function player_strategy_is_constructed_with_an_unexpected_option () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategy = new NextMoveProviderPlayer ($map, $this);
    }
}
