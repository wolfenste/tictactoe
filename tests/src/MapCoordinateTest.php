<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\MapCoordinate;

class MapCoordinateTest extends BaseClassTest {
    /**
     * @test
     */
    public function map_coordinate_is_constructed_with_valid_arguments () {
        $mapCoordinate = new MapCoordinate (2, 2);
        $this->assertTrue (
            is_object ($mapCoordinate) &&
            get_class ($mapCoordinate) === MapCoordinate::class
        );
    }
}
