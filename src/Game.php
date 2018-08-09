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
     * @param $playerX Player object
     * @param $player0 Player object
     * @param $map Map object
     */
    public function __construct (Player $playerX, Player $player0, Map $map) {
	$this->playerX = $playerX;
	$this->player0 = $player0;
	$this->map = $map;
    }
}

