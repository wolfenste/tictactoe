<?php

declare (strict_types = 1);
namespace TicTacToe;

class Mark {
    const SYMBOL_X = 'X';
    const SYMBOL_0 = '0';
    const SYMBOL_NONE = '';

    /**
     * @var string
     */
    private $symbol_value;

    /**
     * Class constructor
     * @param string
     */
    public function __construct (string $value) {
	if ($value === self::SYMBOL_X || 
	    $value === self::SYMBOL_0 || 
	    $value === self::SYMBOL_NONE) {

	    $this->symbol_value = $value;
	} else {
	    throw new \InvalidArgumentException (
		"Only these values are allowed: 'X', '0', or ''."
	    );
	}
    }

    /**
     * @param Mark object
     * @return bool, true if the given object is equal to $this
     */
    public function equal (Mark $object) : bool {
	if (get_class ($object) === self::class && $this->symbol_value === $object->symbol_value) {
	    return true;
	}
	return false;
    }
}

