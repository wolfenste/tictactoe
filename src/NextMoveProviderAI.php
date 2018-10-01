<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderAI implements NextMoveProvider {
    /** 
     * @const AI chooses the first available position
     */
    const STR_FIRST_POS = 'str_first_pos';

    /** 
     * @const AI chooses a random position
     */
    const STR_RANDOM_POS = 'str_random_pos';

    /** 
     * @const AI's improved strategy
     */
    const STR_IMPROVED_POS = 'str_improved_pos';

    /**
     * @var string, will be initialized with one of the three difficulty constants
     */
    private $level;

    /**
     * @var MapCoordinate object
     */
    private $position;

    /** 
     * @var Mark object
     */
    private $myMark;

    /** 
     * @var Mark object
     */
    private $oppMark;

    /**
     * @var bool, true if the player having this strategy waits this round
     */
    private $iAmWaiting;

    /** 
     * @var Map object, implements ReadOnlyMap interface
     */
    private $map;
    /**
     * Class constructor
     * @param Mark object
     * @param Map object
     * @param string
     * @param bool, true if the player having this strategy waits this round
     */
    public function __construct (
        Mark $mark,
        ReadonlyMap $map,
        string $level = self::STR_IMPROVED_POS,
        bool $iAmWaiting = true) {

        if ($mark->equal (new Mark (Mark::SYMBOL_NONE))) {
            throw new \DomainException ('SYMBOL_NONE Mark objects aren\'t allowed.');
        }
        
        if ($level !== self::STR_FIRST_POS &&
            $level !== self::STR_RANDOM_POS &&
            $level !== self::STR_IMPROVED_POS) {

            throw new \DomainException (
                'Third parameter must match one of the STR_* class constants'
            );
        }

        $this->setMyMark ($mark);
        $this->setOppMark ();
        $this->map = new MapAI ($map->getMarks ());
        $this->level = $level;
        $this->iAmWaiting = $iAmWaiting;
        $this->setPosition ();

    }

    /**
     * @return MapCoordinate object or null
     */
    public function getNextMove () {
        return $this->position;
    }

    /**
     * @param Mark object
     * @return void
     */
    private function setMyMark (Mark $mark) : void {
        $this->myMark = $mark;
    }

    /**
     * @return Mark object
     */
    public function getMyMark () : Mark {
        return $this->myMark;
    }

    /**
     * @return void
     */
    private function setOppMark () : void {
        $this->oppMark = ($this->getMyMark ()->equal (new Mark (Mark::SYMBOL_X))) ?
            new Mark (Mark::SYMBOL_0) : new Mark (Mark::SYMBOL_X);
    }

    /** 
     * @return Mark
     */
    private function getOppMark () : Mark {
        return $this->oppMark;
    }   

    /** 
     * @return Map object
     */
    private function getMap () : Map {
        return $this->map;
    }

    /**
     * @return string
     */
    private function getLevel () : string {
        return $this->level;
    }

    /**
     * @return bool
     */
    private function iAmWaiting () : bool {
        return $this->iAmWaiting;
    }

    /**
     * @return void
     */
    private function setPosition () : void {
        if ($this->iAmWaiting) {
            $this->position = null;
            return;
        }

        switch ($this->getLevel ()) {
            case self::STR_FIRST_POS :
                $this->position = $this->getFirstAvailablePositionStrategy ();
                break;
            case self::STR_RANDOM_POS :
                $this->position = $this->getRandomBasedStrategy ();
                break;
            case self::STR_IMPROVED_POS :
                $this->position = $this->getImprovedStrategy ();
                break;
            default :
                $this->position = $this->getImprovedStrategy ();
        }
    }

    /**
     * This is the strategy based on first available position on the map
     * @return MapCoordinate object
     */
    private function getFirstAvailablePositionStrategy () : MapCoordinate {
        return current ($this->getAvailableMoves ());
    }

    /** 
     * @return array containing available moves as MapCoordinate objects
     */
    private function getAvailableMoves () : array {
        return $this->getMap ()->getAvailableMoves (); 
    }   

    /** 
     * @return MapCoordinate object
     */
    private function getRandomBasedStrategy () : MapCoordinate {
        $availableMoves = $this->getAvailableMoves (); 
        return $availableMoves [array_rand ($availableMoves, 1)];
    } 
}


