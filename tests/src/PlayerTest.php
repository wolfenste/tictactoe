<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Player;
use TicTacToe\Mark;

class PlayerTest extends BaseClassTest {
    public function test_player_construction_with_symbol_x () {
	    $playerX = new Player (new Mark (Mark::SYMBOL_X));
	$this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($playerX->getPlayerName ()));
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function the_player_should_not_be_constructed_with_symbol_none () {
        $playerX = new Player (new Mark (Mark::SYMBOL_NONE));
    }

    /**
     * @test
     */
    public function player_construction_with_symbol_0 () {
        $player0 = new Player (new Mark (Mark::SYMBOL_0));
        $this->assertTrue ((new Mark (Mark::SYMBOL_0))->equal ($player0->getPlayerName ()));
    }
}

