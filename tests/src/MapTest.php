<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Map;
use TicTacToe\Mark;

class MapTest extends PHPUnit\Framework\TestCase {
    /**
     * @test
     */
    public function map_is_constructed_with_symbol_none_mark_objects () {
	$marks = array (
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE),
	    new Mark (Mark::SYMBOL_NONE)
        );
	$map = new Map ($marks);
	foreach ($map->getMarks () as $key => $val) {
	    $this->assertTrue ((new Mark (Mark::SYMBOL_NONE))->equal ($val));
	}
    }
}

