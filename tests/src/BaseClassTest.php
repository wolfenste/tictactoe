<?php

namespace TicTacToeTests;

use PHPUnit\Framework\TestCase;
use TicTacToe\Mark;

class BaseClassTest extends TestCase {
    /**
     * Creates a parameter for Map's constructor
     *
     * @param array $overrides, by default is empty. Keys: integers between 0 and 8
     *     Values: Mark objects
     * @return an array of 9 Mark objects
     */
    protected function createEmptyTableSpec ($overrides = []) {
	$arrayOfMarkObjects = array ();
        for ($i = 0; $i < 9; $i++) {
	    if (array_key_exists ($i, $overrides)) {
		$arrayOfMarkObjects [$i] = $overrides [$i];
            } else {
		$arrayOfMarkObjects [$i] = new Mark (Mark::SYMBOL_NONE);
	    }
	}
	return $arrayOfMarkObjects;
    }
}
