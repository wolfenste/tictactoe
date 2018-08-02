<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Map;
use TicTacToe\Mark;

class MapTest extends PHPUnit\Framework\TestCase {
    /**
     * @test
     */
    public function map_construction () {
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
	$this->assertTrue (!empty ($map->getMarks ()));
    }
}

