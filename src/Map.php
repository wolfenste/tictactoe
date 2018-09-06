<?php

declare (strict_types = 1);
namespace TicTacToe;

class Map implements ReadOnlyMap, WritableMap {
    /**
     * @var array containing 9 Mark objects
     */
    private $marks;

    /*
     * @param $marks, array containing 9 Mark objects
     */
    public function __construct (array $marks) {

	if (count ($marks) != 9) {
	    throw new \OutOfRangeException (
		'The parameter does not have the expected length, 9.'
	    );
	}

	foreach ($marks as $key => $val) {
	    if (!is_object ($val) || get_class ($val) !== Mark::class) {
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
    public function getMarks () : array {
	return $this->marks;
    }

    /**
     * @return boolean, true if the map is empty
     */
    public function isEmpty () : bool {
	foreach ($this->marks as $key => $val) {
	    if (!((new Mark (Mark::SYMBOL_NONE))->equal ($val))) {
	        return false;
	    }
	}

	return true;
    }

    /**
     * @param MapCoordinate object
     * @return boolean
     */
    public function isMapAvailable (MapCoordinate $position) : bool {
        $index = $this->coordinatesToMapIndex ($position);

        if ((new Mark (Mark::SYMBOL_NONE))->equal ($this->marks [$index])) {
            return true;
        }

        return false;
    }

    /**
     * @return boolean, true if the map is completed
     */
    public function isCompleted () : bool {
        foreach ($this->marks as $key => $val) {
            if ((new Mark (Mark::SYMBOL_NONE))->equal ($val)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param integer
     * @param Mark object
     * @return void
     */
    public function setMarksCell (MapCoordinate $coordinate, Mark $mark) : void {
    }

    /**
     * @param MapCoordinate object
     * @return int between 0 and 8
     */
    private function coordinatesToMapIndex (MapCoordinate $position) : int {
        $coordinate_x = $position->getCoordinateX ();
        $coordinate_y = $position->getCoordinateY ();
        $sum = $coordinate_x + $coordinate_y;

        if ($coordinate_x === 1) {
            return $sum - 2;
        }
        if ($coordinate_x === 2) {
            return $sum;
        }
        if ($coordinate_x === 3) {
            return $sum + 2;
        }
    }
}

