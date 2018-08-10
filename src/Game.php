<?php

declare (strict_types = 1);
namespace TicTacToe;

class Game {
    /**
     * @var Player object
     */
    private $playerX;

    /**
     * @var Player object
     */
    private $player0;

    /**
     * @var Map object
     */
    private $map;

    /***
     * Class constructor
     * @param $playerX Player object
     * @param $player0 Player object
     * @param $map Map object
     */
    public function __construct (Player $playerX, Player $player0, Map $map) {
        if (!((new Mark (Mark::SYMBOL_X))->equal ($playerX->getPlayerName ()))) {
            throw new \InvalidArgumentException ('The first argument must be Player X.');
        }

        if (!((new Mark (Mark::SYMBOL_0))->equal ($player0->getPlayerName ()))) {
            throw new \InvalidArgumentException ('The second argument must be Player 0.');
        }

	    $this->playerX = $playerX;
	    $this->player0 = $player0;
	    $this->map = $map;
    }

    /**
     * @return boolean, true if the map is empty
     */
    private function isMapEmpty () : bool {
        return $this->map->isEmpty ();
    }
}

