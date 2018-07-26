<?php

declare (strict_types = 1);
namespace TicTacToe;

class Map {
	/**
	 * @var array of Square objects. Yup, the map is made of squares.
	 */
	private $squares;

	/**
	 * @param array containing marks '0' or, 'X', or ''
	 *     its keys have form: '(x, y)' where x and y are chars '1', '2', or '3'
	 * @return void
	 */
	public function __construct ($marks) : void { 
		foreach ($marks as $key => $value) {
			$x = substr ($key, 1, 1);
			$y = substr ($key, 4, 4);
			$this->square [$key] = new Square ($x, $y, new Mark ($value));
		}
	}

	/**
	 * @param Square object
	 * @return bool
	 */
	public function modifySquares (Square $square) : bool {
		if ($this->isSquareAvailable ($square)) {
			$key = '(' . $square->getX () . ', ' . $square->getY () . ')';
			$this->squares [$key] = $square;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return bool, true if the map is full
	 */
	public function isCompleted () : bool {
		foreach ($this->squares as $key => $value) {
			if ($value->getMark ()->equals (new Mark (''))) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @return bool, true if the map is empty
	 */
	public function isEmpty () : bool {
		foreach ($this->squares as &key => $value) {
			if ($value->getMark ()->equals (new Mark ('X')) 
				|| $value->getMark ()->equals (new Mark ('0'))) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @return bool, true if the square is available
	 */
	private function isSquareAvailable (Square $square) : bool {
		$key = '(' . $square->getX () . ', ' . $square->getY () . ')';
		if ($this->squares [$key]->getMark ()->equals (new Mark (''))) {
			return true;
		} else {
			return false;
		}
	}

}
