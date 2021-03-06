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
     * @return int between 1 and 3
     */
    public function getCoordinateX () {
        return $this->coordinate_x;
    }

    /**
     * @return int between 1 and 3
     */
    public function getCoordinateY () {
        return $this->coordinate_y;
    }

    /**
     * @return bool, true if the given object equals this object
     */
    public function equal (MapCoordinate $mapCoordinate) : bool {
        if ($this->getCoordinateX () === $mapCoordinate->getCoordinateX () &&
            $this->getCoordinateY () === $mapCoordinate->getCoordinateY ()) {

            return true;
        }

        return false;
    }
}

