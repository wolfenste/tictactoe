<?php

declare (strict_types = 1);
namespace TicTacToe;

class Player {
    /**
     * @var, Mark object
     */
    private $playerName;

    /**
     * @var instanceof NextMoveProvider interface
     */
    private $strategy;

    /**
     * @var Game object
     */
    private $game;

    /**
     * Class constructor
     *
     * @param Mark object
     * @param instanceof NextMoveProvider interface
     * @param Game object
     */
    public function __construct (
        Mark $playerName, 
        NextMoveProvider $strategy,
        Game $game
        ) {
        
        $this->playerName = $playerName;
        $this->strategy = $strategy;
        $this->game = $game;
    }

    /**
     * @return Mark object
     */
    public function getPlayerName () : Mark {
	    return $this->playerName;
    }

    /**
     *
     */
    public function putMark () {
        $this->getMapAccess () [$this->getStrategyPosition ()] = $this->getPLayerName ();
    }

    /**
     * @return array (the array that is contained in map)
     */
    private function getMapAccess () : array {
        return $this->getGame ()->getMap ()->getMarks ();
    }

    /**
     * @return integer
     */
    private function getStrategyPosition () : int {
        return $this->getStrategy ()->getPosition ();
    }

    /**
     * @return Game object
     */
    private function getGame () : Game {
        return $this->game;
    }

    /**
     * @return instanceof NextMoveProviderInterface
     */
    private function getStrategy () : NextMoveProvider {
        return $this->strategy;
    }
}
