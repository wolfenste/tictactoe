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

    /**
     * @param Mark object
     * @param MapCoordinate object
     * @return void
     */
    public function playerMoveRequest (Mark $mark, MapCoordinate $position) : void {
        if (!$this->isMapAvailable ($position)) {
            throw new BadRequestException ('The player requests an unavailable position.');
        }
        
        // verifica daca $mark se potriveste cu player-ul care a solicitat cererea
        if (!$this->getCurrentPlayerName ()->equal ($mark)) {
            throw new BadRequestException ('Current player and requester mismatch.');
        }

        $this->getMap ()->setMarksCell ($position, $mark);
    }

    /**
     * @param MapCoordinate object
     * @return bool, true if the map is available
     */
    public function isMapAvailable (MapCoordinate $position) : bool {
        return $this->getMap ()->isMapAvailable ($position);
    }

    /**
     * @return Mark object
     */
    private function getCurrentPlayerName () : Mark {
        return $this->getCurrentPlayer ()->getPlayerName ();
    }

    /**
     * @return Player object
     */
    private function getCurrentPlayer () : Player {
        // !! Just for testing purpose, the current player is X
        // the function still MUST be correctly implemented 
        return $this->getPlayerX ();
    }
}

