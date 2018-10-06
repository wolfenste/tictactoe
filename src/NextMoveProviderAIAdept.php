<?php

declare (strict_types = 1); 
namespace TicTacToe;

class NextMoveProviderAIAdept extends NextMoveProviderAI {
    /** 
     * @return MapCoordinate object
     */
    public function getNextMove () : MapCoordinate {
        $availableMoves = $this->getAvailableMoves ();
        return $availableMoves [array_rand ($availableMoves, 1)];
    }   
}

