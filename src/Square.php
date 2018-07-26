<?php

declare (strict_types = 1);
namespace TicTacToe;

class Square {
	/**
	 * @var char '1', '2', or '3'
	 */
	private $x;
	/**
	 * @var char, same as $x
	 */
	private $y;

	/**
	 * @var object
	 */
	private $mark;
	
	/**
	 * Class constructor
	 *
	 * @param char
	 * @param char
	 * @param object
	 * @return void
	 */
	public function __construct (char $x, char $y, Mark $mark) : void {
		$this->x = $x;
		$this->y = $y;
		$this->mark = $mark;
	}
	
	/**
	 * @return char
	 */
	public function getX () : char {
		return $this->x;
	}

	/**
	 * @return char
	 */
	public function getY () : char {
		return $this->y;
	}
	
	/**
	 * @return Mark object
	 */
	public function getMark () {
		return $this->mark;
	}
}
