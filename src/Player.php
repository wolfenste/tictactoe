<?php

declare (strict_types = 1);
namespace TicTacToe;

class Player {
	/**
	 * @var object
	 */
	private $name;
	/**
	 * @var bool, true if the player just won the game
	 */
	private $winSignal;
	/**
	 * @var integer
	 */
	private $row1;
	/**
	 * @var integer
	 */
	private $row2;
	/**
	 * @var integer
	 */
	private $row3;
	/**
	 * @var integer
	 */
	private $col1;
	/**
	 * @var integer
	 */
	private $col2;
	/**
	 * @var integer
	 */
	private $col3;
	/**
	 * @var integer
	 */
	private $diagonal1;
	/**
	 * @var integer
	 */
	private $diagonal2;

	/**
	 * Class constructor
	 *
	 * @param char 'X' or '0'
	 * @param array containing values for player's lines
	 */
	public function __construct (char $mark, $lines) : void {
		$this->name = new Mark ($mark);
		$this->winSignal = false;
		foreach ($lines as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 * Here is the logic where a player makes a move. The map is tested already if the
	 * square is available in the map implementation. No need to check here again. And is
	 * more a concern of the map.
	 * Particular rows, columns and diagonals are updated.
	 *
	 * @param object $square
	 * @return void
	 */
	public function setPlayerLine (Square $square) : void {
		// update particular row and col
		$row = 'row' . $square->getX ();
		$col = 'col' . $square->getY ();
		$this->$row++;
		$this->$col++;

		// if it's the case, update diagonals
		$x = (int) $square->getX ();
		$y = (int) $square->getY ();

		// if x == y, then for sure we are on the first diagonal
		if ($x == $y) {
			$this->diagonal1++;
		}

		// if x + y == n + 1, where n is the number of rows (or columns)
		// then for sure we are on the second diagonal. Here n = 3
		if ($($x + $y) == 4) {
			$this->diagonal2++;
		}
	}
	
	/**
	 * Here is the logic where the application analyzes win situations.
	 * If any of the lines (rows, columns, or diagonals) is 3, we have a 
	 * win situation.
	 *
	 * @return void
	 */
	public function setWinSignal () : void {
		foreach ($this as $player => $line) {
			$i = 0;
			if ($i < 2) { // escape the first two properties, which aren't lines
				$i++;
				break;
			}
			if ($line === 3) {
				$this->winSignal = true;
			} else {
				$this->winSignal = false;
			}
		}
	}

	/**
	 * Returns the state of the win signal
	 *
	 * @return bool, true if the $winSignal is true
	 */
	public function getWinSignal () : bool {
		return $this->winSignal;
	}
}

