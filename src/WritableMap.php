<?php

declare (strict_types = 1);
namespace TicTacToe;

interface WritableMap {
    public function setMarksCell (MapCoordinate $coordinate, Mark $mark);
}

