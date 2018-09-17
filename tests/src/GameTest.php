<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Game;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\NextMoveProviderAI;
use TicTacToe\Map;
use TicTacToe\Mark;
use TicTacToe\MapCoordinate;

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

    /**
     * @test
     */
    public function player_x_requests_a_move_at_mapcoordinate_2_2 () {
        $map = new Map ($this->createEmptyTableSpec ());
        $option = new MapCoordinate (MapCoordinate::TWO, MapCoordinate::TWO);
        $strategyX = new NextMoveProviderPlayer ($map, $option);
        $strategy0 = new NextMoveProviderAI ($map);
        $game = new Game ($strategyX, $strategy0, $map);
        $game->playerMoveRequest (
            $game->getPlayerX ()->getPlayerName (),
            $game->getPlayerX ()->getStrategyPosition ()
        );
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($map->getMarks () [4]));
    }
}
