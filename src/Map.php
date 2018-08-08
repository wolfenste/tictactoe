<?php

namespace TicTacToe;

class Map {
    /**
     * @var array containing 9 Mark objects
     */
    private $marks;

    /*
     * @param $marks, array containing 9 Mark objects
     */
    public function __construct ($marks) {
	if (!is_array ($marks)) {
	    throw new \InvalidArgumentException (
	        'Only array type is allowed as parameter.'
	    );
	}

	if (count ($marks) != 9) {
	    throw new \OutOfRangeException (
		'The parameter does not have the expected length, 9.'
	    );
	}

	foreach ($marks as $key => $val) {
	    if (get_class ($val) !== Mark::class) {
		throw new \DomainException (
		    'The element must be a Mark object.'
		);
	    }
	}
	
	$this->marks = $marks;
    }

    /**
     * @return array
     */
    public function getMarks () {
	return $this->marks;
    }

    /**
     * @return boolean, true if the map is empty
     */
    public function isEmpty () {
	foreach ($this->marks as $key => $val) {
	    if (!((new Mark (Mark::SYMBOL_NONE))->equal ($val))) {
	        return false;
	    }
	}

	return true;
    }
}

