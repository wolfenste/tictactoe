<?php

declare (strict_types = 1);
namespace TicTacToe;

class MapCoordinate {
    const ONE = 1;
    const TWO = 2;
    const THREE = 3;

    /**
     * @var integer between 1 and 3
     */
    private $coordinate_x;

    /**
     * @var integer between 1 and 3
     */
    private $coordinate_y;
}

