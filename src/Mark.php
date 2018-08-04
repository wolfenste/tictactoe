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
	    if ($value === self::SYMBOL_X || 
	        $value === self::SYMBOL_0 || 
		$value === self::SYMBOL_NONE) {

		$this->symbol_value = $value;
	    } else {
		throw new \Exception ('Invalid Mark consructor\'s parameter.');
	    }
	} catch (\Exception $e) {
	}
    }

    /**
     * @param Mark object
     * @return bool, true if the given object is equal to $this
     */
    public function equal (Mark $object) {
	if (get_class ($object) === 'TicTacToe\Mark' && $this->symbol_value === $object->symbol_value) {
	    return true;
	} else {
	    return false;
	}
    }
}

