<?php

declare (strict_types = 1);
namespace TicTacToe;

class Mark {
    /**
     * @var char
     */
    private $mark;

    /*
     * Class constructor 
     *
     * @param char
     * @return void
     */
    public function __construct (char $mark) : void {
	$this->mark = $mark;
    }
    
    /**
     * @param object
     * @return bool
     */
    public function equals (Mark $object) : bool {
	    return (
		    get_class ($object) == 'Mark'
		    && $this->mark == $object->mark;
	    );
    }
}

