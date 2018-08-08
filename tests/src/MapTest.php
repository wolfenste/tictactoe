<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Map;
use TicTacToe\Mark;

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
}

