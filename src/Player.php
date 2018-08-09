<?php

declare (strict_types = 1);
namespace TicTacToe;

class Player {
    /**
     * @var, Mark object
     */
    private $playerName;

    /**
     * Class constructor
     *
     * @param $mark, Mark object
     */
    public function __construct (Mark $mark) {
	if (get_class ($mark) !== Mark::class) {
	    throw new \InvalidArgumentException (
	        'The argument must be a Mark object.'
	    );
	}

	$this->playerName = $mark;
    }

    /**
     * @return Mark object
     */
    public function getPlayerName () : Mark {
	return $this->playerName;
    }
}
