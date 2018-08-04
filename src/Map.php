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
                throw new \Exception ('Map constructor\'s parameter is not array.');
	    } else if (count ($marks) != 9) {
		    throw new \Exception ('Map constructor\'s parameter have not the expected length 9.');
	    } else {
		foreach ($marks as $key => $val) {
		    if (get_class ($val) !== 'Mark') {
			throw new \Exception ('Invalid element in Map constructor\'s parameter.');
			break;
		    }
		}
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
}

