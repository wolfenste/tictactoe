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

    /**
     * @var integer between 0 and 8 
     */
    private mapIndex;

    /**
     * @param integer
     * @param integer
     */
    public function __construct (int $x, int $y) {
        if ($x < self::ONE || $x > self::THREE || $y < self::ONE || $y > self::THREE) {
            throw new \RangeException ('Both arguments must be in interval [1, 3]');
        }

        $this->coordinate_x = $x;
        $this->coordinate_y = $y;
    }

    /**
     * @return integer (an index useful in map's array)
     */
    public function coordinatesToMapIndex () : int {
        $sum = $this->coordinate_x + $this->coordinate_y;
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

