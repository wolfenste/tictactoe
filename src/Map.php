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
	$this->marks = $marks;
    }

    /**
     * @return array
     */
    public function getMarks () {
	return $this->marks;
    }
}

