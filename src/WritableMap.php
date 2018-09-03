<?php

declare (strict_types = 1);
namespace TicTacToe;

interface WritableMap {
    public function setMarksCell (int $index, Mark $mark);
}

