<?php

namespace TicTacToe;

class Mark {
    const SYMBOL_X = 'X';
    const SYMBOL_0 = '0';
    const SYMBOL_NONE = '';

    /**
     * @var char
     */
    private $symbol_value;

    /**
     * @return char
     */
    public function getValue () {
        return $this->symbol_value;
    }
}

