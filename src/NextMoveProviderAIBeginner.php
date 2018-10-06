<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderAIBeginner extends NextMoveProviderAI {
    /**
     * @return MapCoordinate object
     */
    public function getNextMove () : MapCoordinate {
        return current ($this->getAvailableMoves ());
    }
}

