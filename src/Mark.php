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
     * Class constructor
     * @param char
     */
    public function __construct ($value) {
	try {
	    if ($value === 'X' || $value === '0' || $value === '') {
		$this->symbol_value = $value;
	    } else {
		throw new \Exception ('Invalid Mark consructor\'s parameter.');
	    }
	} catch (\Exception $e) {
	    echo $e->getMessage ();
	}
    }

    /**
     * @return char
     */
    public function getValue () {
        return $this->symbol_value;
    }
}

