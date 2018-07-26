<?php

declare (strict_types = 1);
namespace TicTacToe;

class Game {
	/*
	 * @var object
	 */
	private $playerX;
	/**
	 * @var object
	 */
	private $player0;
	/**
	 * @var object
	 */
	private $map;
	/**
	 * @var object
	 */
	private $square;
	/**
	 * @var object
	 */
	private $mark;
	/**
	 * @var string
	 */
	private $gameStatus;
	/**
	 * @var string
	 */
	private $whoWon;
	/**
	 * @var object
	 */
	private $view;
	
	/**
	 * Constructor
	 *
	 * @param object $playerX
	 * @param object $player0
	 * @param object $map
	 * @param object $square
	 * @param object $mark
	 * @return void
	 */
	public function __construct ($playerX, $player0, $map, $square, $mark ) {
		$this->playerX = $playerX;
		$this->player0 = $player0;
		$this->map = $map;
		$square = $square;
		$this->mark = $mark;
		$this->setGameStatus ();
		$this->setWhoWon ();
	}
	
	/**
	 * Returns the current player
	 *
	 * @return object
	 */
	public function getCurrentPlayer () {
		if ($this->mark->equals (new Mark ('X')) {
			return $this->playerX;
		} else if ($this->mark->equals (new Mark ('0')) {
			return $this->player0;
		}
	}

	/**
	 * Updates the current player according to the input received.
	 *
	 * @return void
	 */
	private function updateCurrentPlayer () : void {
		$this->getCurrentPlayer ()->setPlayerLine ($this->square);
		$this->getCurrentPlayer ()->setWinSignal ();
	}

	/**
	 * Updates the map according to the input received.
	 *
	 * @return bool, true if the update occurred, and false otherwise.
	 */
	private function updateMap () : bool {
		if ($this->map->modifySquares ($this->square)) {
			return true;
		}
		return false;
	}

	/**
	 * Checks if the current player won the game after his move.
	 *
	 * @return bool, true if the current player won the game.
	 */
	public function winCheck () : bool {
		return getCurrentPlayer ()->getWinSignal ();
	}

	/**
	 * Verifies if the map is completed
	 *
	 * @return bool, true if the map is completed
	 */
	public function isMapCompleted () : bool {
		if ($this->map->isCompleted ()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Verifies if the map is empty
	 *
	 * @return bool, true if the map is empty
	 */
	public function isMapEmpty () : bool {
		if ($this->map->isEmpty ()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Sets the status of the game ($gameStatus variable).
	 * Possible values: start, in_progress, end
	 *
	 * @return void
	 */
	private function setGameStatus () : void {
		if ($this->square == null) {
			$this->gameStatus = 'start';
		} else if ($this->winCheck ()) {
			$this->gameStatus = 'end';
		} else if ($this->isMapCompleted ()) {
			$this->gameStatus = 'end';
		} else {
			$this->gameStatus = 'in_progress';
		}
	}

	/**
	 * Returns the status of the game
	 *
	 * @return string
	 */
	public function getGameStatus () : string {
		return $this->gameStatus;
	}

	/**
	 * Determines who won the game. Empty string if we do not have a winner yet.
	 *
	 * @return void
	 */
	private function setWhoWon () : void {
		if ($this->winCheck ()) {
			if ($this->mark->equals (new Mark ('X'))) {
				$this->whoWon = 'player_x';
			} else if ($this->mark->equals (new Mark ('0'))) {
				$this->whoWon = 'player_0';
			}
		} else {
			$this->whoWon = '';
		}
	}

	/**
	 * Retrurns who won the game. Empty string if no one won the game yet.
	 *
	 * @return string
	 */
	public function getWhoWon () : string {
		return $this->whoWon;
	}

	/**
	 * Sets the next player.
	 *
	 * @return void
	 */
	private function setNextPlayer () : void {
		if ($this->mark->equals (new Mark ('X')) {
			$this->mark = new Mark ('0');
		} else {
			$this->mark = new Mark ('X');
		}
	}

	/**
	 * Plays the game. This concentrates the logic of the game, by calling the appropriate
	 * methods. If the game is in progress, it checks for a winner and/or if the end of the
	 * game occurred. Sets the next player if not. Either case, it calls the view.
	 *
	 * @return void
	 */
	public function playGame () : void {
		if ($this->getGameStatus () == 'in_progress') {
			if ($this->updateMap ()) {
				$this->updateCurrentPlayer ();
				$this->setGameStatus ();
			}
			if ($this->getGameStatus () == 'end') {
				$this->setWhoWon ();
			} else if ($this->getGameStatus () == 'in_progress') {
				$this->setNextPlayer ();
			}
		}
		$this->setView ();
	}
}
