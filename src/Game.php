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
     * @param $strategyPlayer NextMoveProviderPlayer object
     * @param $strategyAI NextMoveProviderAI object
     * @param $map Map object
     */
    public function __construct (
        NextMoveProviderPlayer $strategyPlayer,
        NextMoveProviderAI $strategyAI,
        Map $map) {

        if ($strategyPlayer->getSymbol ()->equal (new Mark (Mark::SYMBOL_X))) {
            $this->playerX = new Player (new Mark (Mark::SYMBOL_X), $strategyPlayer, $this);
            $this->player0 = new Player (new Mark (Mark::SYMBOL_0), $strategyAI, $this);
        } else {
            $this->playerX = new Player (new Mark (Mark::SYMBOL_X), $strategyAI, $this);
            $this->player0 = new Player (new Mark (Mark::SYMBOL_0), $strategyPlayer, $this);
        }

        $this->map = $map;
    }

    /**
     * @return boolean, true if the map is empty
     */
    public function isMapEmpty () : bool {
        return $this->map->isEmpty ();
    }
}

