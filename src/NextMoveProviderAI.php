<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderAI implements NextMoveProvider {
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
     * @var Map object, implements ReadOnlyMap interface
     */
    private $map;
    /**
     * Class constructor
     * @param Mark object
     * @param Map object
     */
    public function __construct (Mark $mark, ReadonlyMap $map) {
        if ($mark->equal (new Mark (Mark::SYMBOL_NONE))) {
            throw new \DomainException ('SYMBOL_NONE Mark objects aren\'t allowed.');
        }

        $this->setMyMark ($mark);
        $this->setOppMark ();
        $this->map = new MapAI ($map->getMarks ());
    }

    /**
     * @return MapCoordinate object or null
     */
    public function getNextMove () {
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
}

