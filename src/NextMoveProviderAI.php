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
}

