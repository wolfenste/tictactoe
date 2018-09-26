<?php

declare (strict_types = 1);
namespace TicTacToe;

class MapAI extends Map {
    /**
     * @var array of 9 Mark objects
     */
    private $marks;

    /**
     * Class constructor 
     * @param array of 9 Mark objects
     */
    public function __construct (array $marks) {
        $this->marks = $marks;
    }
}
