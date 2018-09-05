<?php

declare (strict_types = 1);
namespace TicTacToe;

interface ReadOnlyMap {
    public function isEmpty ();
    public function isCompleted ();
    public function isMapAvailable (MapCoordinate $position);
}

