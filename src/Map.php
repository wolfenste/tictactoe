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
	    if (is_array ($marks) && count ($marks) == 9) {
		$validator = true;
		foreach ($marks as $key => $val) {
		    if (get_class ($val) != 'Mark') {
			$validator = false;
		    }
		}
		if ($validator) {
		    $this->marks = $marks;
		} else {
		    throw new \Exception ('Invalid element in Map constructor\'s parameter');
		}
	    } else {
		throw new \Exception ('Invalid Map constructor\'s parameter');
	    }
	} catch (\Exception $e) {
	    echo $e->getMessage ();
	}
    }	

    /**
     * @return array
     */
    public function getMarks () {
	return $this->marks;
    }
}

