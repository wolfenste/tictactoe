<?php

namespace TicTacToe;

class GameStatus {

    /**
     * @const the game is at the beginning
     */
	const STATUS_START = 'status_start';

    /**
     * @const the game is in progress
     */
	const STATUS_IN_PROGRESS = 'status_in_progress';

    /**
     * @const the game is finished
     */
    const STATUS_END = 'status_end';

    /**
     * @var string
     */
    private $status;
    
    /**
     * Class constructor
     * @param string
     */
    public function __construct ($value) {
	if ($value === self::STATUS_START ||
	    $value === self::STATUS_IN_PROGRESS ||
	    $value === self::STATUS_END) {
	    
	    $this->status = $value;
	} else {
	    throw new \InvalidArgumentException (
		'Only the following strings are allowed: "status_start", "status_in_progress", and "status_end".'
	    );
	}
    }
}

