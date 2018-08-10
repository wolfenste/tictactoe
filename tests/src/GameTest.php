<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Game;
use TicTacToe\Player;
use TicTacToe\Map;
use TicTacToe\Mark;

class GameTest extends BaseClassTest {
    /**
     * @test
     */
    public function game_is_constructed_with_an_empty_map () {
	    $playerX = new Player (new Mark (Mark::SYMBOL_X));
	    $player0 = new Player (new Mark (Mark::SYMBOL_0));
        $map = new Map ($this->createEmptyTableSpec ());

        $method = new ReflectionMethod (Game::class, 'isMapEmpty');
        $method->setAccessible (true);
        $game = new Game ($playerX, $player0, $map);

        $this->assertTrue (is_object ($game) && (get_class ($game) === Game::class));
        $method->invoke ($game);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function game_is_constructed_with_an_invalid_player () {
        $playerX = new Player (new Mark (Mark::SYMBOL_X));
        $player0 = new Player (new Mark (Mark::SYMBOL_X));
        $map = new Map ($this->createEmptyTableSpec ());
        $game = new Game ($playerX, $player0, $map);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException 
     */
    public function game_is_constructed_with_an_invalid_player_2 () {
        $playerX = new Player (new Mark (Mark::SYMBOL_0));
        $player0 = new Player (new Mark (Mark::SYMBOL_0));
        $map = new Map ($this->createEmptyTableSpec ());
        $game = new Game ($playerX, $player0, $map);
    }
}
