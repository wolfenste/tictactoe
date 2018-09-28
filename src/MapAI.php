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
}
