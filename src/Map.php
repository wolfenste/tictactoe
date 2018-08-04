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
	try {
	    if (!is_array ($marks)) {
		throw new \InvalidArgumentException (
		    'Only array is allowed as parameter.'
	        );
	    } else if (count ($marks) != 9) {
		throw new \OutOfRangeException (
		    'The parameter have not the expected length, 9.'
	        );
	    } else {
		foreach ($marks as $key => $val) {
		    if (get_class ($val) !== 'Mark') {
			throw new \DomainException (
			    'The element must be a Mark object.'
		        );
			break;
		    }
		}
	    }
	} catch (\InvalidArgumentException $e) {
	} catch (\OutOfRangeException $e) {
	} catch (\DomainException $e) {
	}
	$this->marks = $marks;
    }

    /**
     * @return array
     */
    public function getMarks () {
	return $this->marks;
    }
}

