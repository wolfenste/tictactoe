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

}

