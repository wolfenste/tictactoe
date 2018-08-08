<?php

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
     * @param $playerX Player object
     * @param $player0 Player object
     * @param $map Map object
     */
    public function __construct ($playerX, $player0, $map) {
	if (!is_object ($playerX) || get_class ($playerX) != Player::class) {
	    throw new \InvalidArgumentException (
		'The first paramater must be a Player object.'
	    );
	}

	if (!is_object ($player0) || get_class ($player0) != Player::class) {
	    throw new \InvalidArgumentException (
		'The second parameter must be a Player object.'
	    );
	}

	if (!is_object ($map) || get_class ($map) != Map::class) {
	    throw new \InvalidArgumentException (
		'The third parameter must be a Map object.'
	    );
	}

	$this->playerX = $playerX;
	$this->player0 = $player0;
	$this->map = $map;
    }
}

