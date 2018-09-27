<?php

declare (strict_types = 1);
namespace TicTacToe;

class Map implements ReadOnlyMap, WritableMap {
    /**
     * @var array containing 9 Mark objects
     */
    protected $marks;

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
    public function setMarksCell (MapCoordinate $position, Mark $mark) : void {
        if ((new Mark (Mark::SYMBOL_NONE))->equal ($mark)) {
            throw new \InvalidArgumentException ('SYMBOL_NONE mark is not allowed.');
        }

        if ($this->isMapAvailable ($position)) {
            $this->marks [$this->coordinatesToMapIndex ($position)] = $mark;
        }
    }

    /**
     * @param MapCoordinate object
     * @return int between 0 and 8
     */
    protected function coordinatesToMapIndex (MapCoordinate $position) : int {
        return 3 * ($position->getCoordinateX () - 1) + ($position->getCoordinateY () -1);
    }

    /** 
     * @param MapCoordinate object
     * @param Mark object
     * @return bool, true if the given Mark object equals the object found at the given
     * MapCoordinate address
     */
    public function isMatching (MapCoordinate $position, Mark $mark) : bool {
        if ($mark->equal ($this->getMarkAtMapCoordinate ($position))) {
            return true;
        }

        return false;
    }   

    /** 
     * @param MapCoordinate
     * @return Mark object
     */
    protected function getMarkAtMapCoordinate (MapCoordinate $position) : Mark {
        return $this->getMarks () [$this->coordinatesToMapIndex ($position)];
    }   

    /** 
     * @param int, between 0 and 8
     * @return MapCoodinate object
     */
    protected function mapIndexToCoordinates (int $index) : MapCoordinate {
        if ($index < 0 || $index > 8) {
            throw new \OutOfBoundsException ('The parameter must be in range [0, 9)');
        }

        $coordinate_x = (int) (($index + 3) / 3); 
        $coordinate_y = (int) (($index + 3) % 3 + 1); 

        return new MapCoordinate ($coordinate_x, $coordinate_y);
    } 
}

