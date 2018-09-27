<?php

use TicTacToeTests\BaseClassTest;
use TicTacToe\Game;
use TicTacToe\NextMoveProviderPlayer;
use TicTacToe\NextMoveProviderAI;
use TicTacToe\Map;
use TicTacToe\Mark;
use TicTacToe\MapCoordinate;
use TicTacToe\BadRequestException;

class GameTest extends BaseClassTest {
    /**
     * @test
     */
    public function game_is_constructed_with_an_empty_map () {
        $map = new Map ($this->createEmptyTableSpec ());
        $option = null;
        $strategyX = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $option);
        $strategy0 = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_0), $map, $option);
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
        $strategyX = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $option);
        $strategy0 = new NextMoveProviderAI (new Mark (Mark::SYMBOL_0), $map);
        $game = new Game ($strategyX, $strategy0, $map);
        $game->playerMoveRequest (
            $game->getPlayerX ()->getPlayerName (),
            $game->getPlayerX ()->getStrategyPosition ()
        );
        $this->assertTrue ((new Mark (Mark::SYMBOL_X))->equal ($map->getMarks () [4]));
    }

    /**
     * @test
     * @expectedException TicTacToe\BadRequestException
     * @expectedExceptionMessage The player requests an unavailable position.
     */
    public function player_x_requests_an_unavailable_position_2_2 () {
        $map = new Map ($this->createEmptyTableSpec (array (4 => new Mark (Mark::SYMBOL_0))));
        $option = new MapCoordinate (2, 3);
        $strategyX = new NextMoveProviderPlayer (new Mark (Mark::SYMBOL_X), $map, $option);
        $strategy0 = new NextMoveProviderAI (new Mark (Mark::SYMBOL_0), $map);
        $game = new Game ($strategyX, $strategy0, $map);
        $game->playerMoveRequest (
            $game->getPlayerX ()->getPlayerName (),
            new MapCoordinate (2, 2)
        );
    }

    /**
     * @test
     * @expectedException TicTacToe\BadRequestException
     * @expectedExceptionMessage Current player and requester mismatch.
     */
    public function player_0_tries_to_move_without_being_the_current_player () {
        $map = new Map ($this->createEmptyTableSpec ());
        $strategyX = new NextMoveProviderPlayer (
            new Mark (Mark::SYMBOL_X), $map, new MapCoordinate (1, 2)
        );
        $strategy0 = new NextMoveProviderPlayer (
            new Mark (Mark::SYMBOL_0), $map, new MapCoordinate (2, 2)
        );
        $game = new Game ($strategyX, $strategy0, $map);
        $game->playerMoveRequest (
            $game->getPlayer0 ()->getPlayerName (),
            $game->getPlayer0 ()->getStrategyPosition ()
        );
    }
}
