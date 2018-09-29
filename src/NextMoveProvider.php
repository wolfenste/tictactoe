<?php

declare (strict_types = 1);
namespace TicTacToe;

interface NextMoveProvider {
    /**
     * @return MapCoordinate object or null
     */
    public function getNextMove () {}

    /**
     * @return Mark object
     */
    public function getMyMark () : Mark {}
}

