<?php

declare (strict_types = 1);
namespace TicTacToe;

class MapAI extends Map {
    /** 
     * @param MapCoordinate object, the position that should be erased
     * @return void
     */
    public function erase (MapCoordinate $position) : void {
        $this->marks [$this->coordinatesToMapIndex ($position)] = 
            new Mark (Mark::SYMBOL_NONE);
    }

    /** 
     * @return array having MapCoordinates as elements
     */
    public function getAvailableMoves () : array {
        $availableMoves = array (); 
        foreach ($this->getMarks () as $index => $mark) {
            if ((new Mark (Mark::SYMBOL_NONE))->equal ($mark)) {
                $availableMoves [$index] = $this->mapIndexToCoordinates ($index);
            }
        }

        return $availableMoves;
    }
}
