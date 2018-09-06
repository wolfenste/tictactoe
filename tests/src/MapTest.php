<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Map;
use TicTacToe\Mark;
use TicTacToe\MapCoordinate;

class MapTest extends BaseClassTest {
    /**
     * @test
     */
    public function map_is_constructed_with_symbol_none_mark_objects () {
	$marks = $this->createEmptyTableSpec ();
	$map = new Map ($marks);
	foreach ($map->getMarks () as $key => $val) {
	    $this->assertTrue ((new Mark (Mark::SYMBOL_NONE))->equal ($val));
	}
    }

    /**
     * @test
     */
    public function the_map_should_be_empty () {
	$map = new Map ($this->createEmptyTableSpec ());

	$this->assertTrue ($map->isEmpty ());
    }

    /**
     * @test
     * @expectedException OutOfRangeException
     */
    public function map_tries_to_be_constructed_with_a_longer_parameter () {
	$marks = $this->createEmptyTableSpec ();
	$marks [] = new Mark (Mark::SYMBOL_NONE);
	$map = new Map ($marks);
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function map_tries_to_be_constructed_with_an_unexpected_in_array_object () {
	$marks = $this->createEmptyTableSpec ();
	$marks [7] = $this;
	$map = new Map ($marks);
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function map_tries_to_be_constructed_with_an_unexpected_in_array_element () {
        $marks = $this->createEmptyTableSpec ();
        $marks [5] = 5;
        $map = new Map ($marks);
    }

    /**
     * @test
     */
    public function map_is_available_at_position_5 () {
        $map = new Map ($this->createEmptyTableSpec ());
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (2, 3)));
    }

    /**
     * @test
     */
    public function map_is_not_available_at_position_5 () {
        $map = new Map ($this->createEmptyTableSpec (array (
            5 => new Mark (Mark::SYMBOL_X)
        )));
        $this->assertFalse ($map->isMapAvailable (new MapCoordinate (2, 3)));
    }

    /**
     * @test
     */
    public function map_is_completed () {
        $map = new Map ($this->createEmptyTableSpec (array (
            0 => new Mark (Mark::SYMBOL_X),
            1 => new Mark (Mark::SYMBOL_0),
            2 => new Mark (Mark::SYMBOL_X),
            3 => new Mark (Mark::SYMBOL_0),
            4 => new Mark (Mark::SYMBOL_X),
            5 => new Mark (Mark::SYMBOL_0),
            6 => new Mark (Mark::SYMBOL_X),
            7 => new Mark (Mark::SYMBOL_0),
            8 => new Mark (Mark::SYMBOL_X)
        )));
        $this->assertTrue ($map->isCompleted ());
    }

    /**
     * @test
     */
    public function map_is_not_completed () {
        $map = new Map ($this->createEmptyTableSpec (array (
            2 => new Mark (Mark::SYMBOL_X),
            5 => new Mark (Mark::SYMBOL_0),
            8 => new Mark (Mark::SYMBOL_X)
        )));
        $this->assertFalse ($map->isCompleted ());
    }

    /**
     * @test
     */
    public function map_is_available_at_any_position () {
        $map = new Map ($this->createEmptyTableSpec ());

        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (1, 1)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (1, 2)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (1, 3)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (2, 1)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (2, 2)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (2, 3)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (3, 1)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (3, 2)));
        $this->assertTrue ($map->isMapAvailable (new MapCoordinate (3, 3)));
    }
}

