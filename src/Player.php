<?php

declare (strict_types = 1);
namespace TicTacToe;

/**
 * This class emulates a player in TicTacToe game.
 */
class Player {

    /**
     * The number of marked cells on row 1
     * @var integer
     */
    private $row1;

    /**
     * The number of marked cells on row 2
     * @var integer
     */
    private $row2;

    /**
     * The number of marked cells on row 3
     * @var integer 
     */
    private $row3;

    /**
     * The number of marked cells on col 1
     * @var integer
     */
    private $col1;

    /**
     * The number of marked cells on col 2
     * @var integer
     */
    private $col2;

    /**
     * The number of marked cells on col 3
     * @var integer
     */
    private $col3;

    /**
     * The number of marked cells on diagonal 1
     * @var integer
     */
    private $diagonal1;

    /**
     * The number of marked cells on diagobal 2
     * @var integer
     */
    private $diagonal2;

    /**
     * True if the current player is the winner
     * @var bool
     */
    private $amItheWinner = false;

    /*
     * Class constructor
     *
     * @param array
     * @return void
     */
    public function __construct (array $playerConfiguration) {
    }

    /*
     * Updates $row1 property
     * @return void 
     */
    public function setRow1 () {
	$this->row1++;
    }

    /*
     * Updates $row2 property
     * @return void
     */
    public function setRow2 () {
	$this->row2++;
    }

    /*
     * Updated $row3 property
     * @return void
     */
    public function setRow3 () {
	$this->row3++;
    }

    /*
     * Updates $col1 property
     * @return void
     */
    public function setCol1 () {
	$this->col1++;
    }

    /*
     * Updates $col2 property
     * @return void
     */
    public function setCol2 () {
	$this->col2++;
    }

    /*
     * Updates $col3 property
     * @return void
     */
    public function setCol3 () {
	$this->col3++;
    }

    /*
     * Updates $diagonal1 property
     * @return void
     */
    public function setDiagonal1 () {
	$this->diagonal1++;
    }

    /*
     * Updates $diagonal2 property
     * @return void
     */
    public function setDiagonal2 () {
	$this->doagonal1++;
    }

    /*
     * Updates $amItheWinner property
     * @param bool
     * @return void
     */
    public function setAmItheWinner (bool $amItheWinner = false) {
	    $this->amItheWinner = $amItheWinner;
    }

    /*
     * @return integer
     */
    public function getRow1 () : int {
	return $this->row1;
    }

   /**
    * @return integer 
    */
    public function getRow2 () : int {
	return $this->row2;
    }

    /**
     * @return integer
     */
    public function getRow3 () : int {
	return $this->row3;
    }

    /**
     * @return integer
     */
    public function getCol1 () : int {
	return $this->col1;
    }

    /**
     * @return integer
     */
    public function getCol2 () : int {
        return $this->col2;
    }

    /**
     * @return integer
     */
    public function getCol3 () : int {
	return $this->col3;
    }

    /**
     * @return integer
     */
    public function getDiagonal1 () : int {
	return $this->diagonal1;
    }

    /**
     * @return integer
     */
    public function getDiagonal2 () : int {
	return $this->diagonal2;
    }

    /**
     * @return bool
     */
    public function amItheWinner () : bool {
	return $this->amItheWinner;
    }
}

