<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderPlayer implements NextMoveProvider {
    /**
     * @var integer (a position corresponding to a map cell and also corresponding to 
     * a map's array index)
     */
    private $position;

    /**
     * @return integer
     */
    public function getPosition () : int {
        return $this->position;
    }
}
