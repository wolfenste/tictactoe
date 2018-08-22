<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Game;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\Map;
use TicTacToe\Mark;

class GameTest extends BaseClassTest {
    /**
     * @test
     */
    public function game_is_constructed_with_an_empty_map () {
        $map = new Map ($this->createEmptyTableSpec ());
        $option = null;
        $strategyX = new NextMoveProviderPlayer ($map, $option);
        $strategy0 = new NextMoveProviderPlayer ($map, $option);
        $game = new Game ($strategyX, $strategy0, $map);

        $this->assertTrue (is_object ($game) && (get_class ($game) === Game::class));
        $this->assertTrue ($game->isMapEmpty ());
    }
}
