<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderPlayer implements NextMoveProvider {
    /**
     * @var MapCoordinate object (also, it can be null).
     */
    private $position;

    /**
     * @return MapCoordinate object or null
     */
    public function getPositionAsMapCoordinate () {
        return $this->position;
    }
}
