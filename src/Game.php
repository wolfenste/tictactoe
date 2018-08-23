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
     * @param $strategyX instanceof NextMoveProvider interface
     * @param $strategy0 instanceof NextMoveProvide interface
     * @param $map Map object
     */
    public function __construct (
        NextMoveProvider $strategyX,
        NextMoveProvider $strategy0,
        Map $map) {

        $this->playerX = new Player (new Mark (Mark::SYMBOL_X), $strategyX, $this);
        $this->player0 = new Player (new Mark (Mark::SYMBOL_0), $strategy0, $this);
        $this->map = $map;
    }

    /**
     * @return boolean, true if the map is empty
     */
    public function isMapEmpty () : bool {
        return $this->map->isEmpty ();
    }

    /**
     * @return Player object
     */
    public function getPlayerX () : Player {
        return $this->playerX;
    }

    /**
     * @return Player object
     */
    public function getPLayer0 () : PLayer {
        return $this->player0;
    }

    /**
     * @return Map object
     */
    public function getMap () : Map {
        return $this->map;
    }
}

