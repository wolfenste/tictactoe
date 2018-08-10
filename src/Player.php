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
        if ((new Mark (Mark::SYMBOL_X))->equal ($mark) ||
            (new Mark (Mark::SYMBOL_0))->equal ($mark)) {

            $this->playerName = $mark;
        } else {
            throw new \InvalidArgumentException ('Player can be only X or 0.');
        }
    }

    /**
     * @return Mark object
     */
    public function getPlayerName () : Mark {
	return $this->playerName;
    }
}
