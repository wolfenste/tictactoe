<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderAIAdvanced extends NextMoveProviderAI {
    /**
     * @const
     */
    const LOOK_AHEAD_MOVES = 2;

    /**
     * @return MapCoordinate object or null
     */
    public function getNextMove () {
        return $this->getBestMove (self::LOOK_AHEAD_MOVES, true) [1];
    }

    /**
     * @param MapCoordinate object
     * @param Mark object
     * @return bool, true if the given Mark object equals the object found at the given
     * MapCoordinate address
     */
    private function isMatching (MapCoordinate $position, Mark $mark) : bool {
        return $this->getMap ()->isMatching ($position, $mark);
    }

    /**
     * Evaluates the score per line (i.e. row, column, or diagonal)
     * @param MapCordinate object
     * @param MapCoordinate object
     * @param MapCoordinate object
     * @return integer
     *     +100 if AI has 3 symbols on line
     *     +10 if AI has 2 symbols on line AND there is an empty cell
     *     +1 if AI has 1 symbol on line AND there is 2 empty cells
     *     0 if both players have symbols on that line, or it's an empty line
     *     -1 if the opponent has 1 symbol on line AND there are 2 empty cells
     *     -10 if the opponent has 2 symbols on line AND there is 1 empty cell
     *     -100 if the opponent has 3 symbols on line 
     */
    private function evaluateLine (
        MapCoordinate $cell1,
        MapCoordinate $cell2,
        MapCoordinate $cell3
        ) : int {

        $line = array ($cell1, $cell2, $cell3);
        $myScore = 0; // how many marks I have per line
        $oppScore = 0; // how many marks the opponent has per line

        foreach ($line as $key => $cell) {
            if ($this->isMatching ($cell, $this->getMyMark ())) {
                $myScore++;
            } else if ($this->isMatching ($cell, $this->getOppMark ())) {
                $oppScore++;
            }
        }

        if (($myScore > 0 && $oppScore > 0) || ($myScore == 0 && $oppScore == 0)) {
            // mixt line or empty line
            return 0;
        }

        if ($myScore == 0) {
            return -(pow (10, ($oppScore - 1)));
        }

        if ($oppScore == 0) {
            return pow (10, ($myScore -1));
        }
    }

   /**
     * Evaluates the score for the entire map
     * @return int
     */
    private function evaluate () : int {
        $score = 0;

        for ($i = 1; $i <= 3; $i++) {
            // compute lines
            $score += $this->evaluateLine (
                new MapCoordinate ($i, 1),
                new MapCoordinate ($i, 2),
                new MapCoordinate ($i, 3)
            );

            // adding columns
            $score += $this->evaluateLine (
                new MapCoordinate (1, $i),
                new MapCoordinate (2, $i),
                new MapCoordinate (3, $i)
            );
        }

        // and diagonals
        $score += $this->evaluateLine (
            new MapCoordinate (1, 2), 
            new MapCoordinate (2, 2),
            new MapCoordinate (3, 3)
        );
        $score += $this->evaluateLine (
            new MapCoordinate (1, 3), 
            new MapCoordinate (2, 2),
            new MapCoordinate (3, 1)
        );

        return $score;
    }

    /**
     * @param integer
     * @param bool
     * @return array {int, MapCoordinate}
     */
    private function getBestMove (
        int $level = self::LOOK_AHEAD_MOVES, 
        bool $myTurn = true) {

        $availableMoves = $this->getAvailableMoves ();

        // if the map is empty (i.e ai player moves first), the best move is in the center
        if ($this->getMap ()->isEmpty ()) {
            return array (1, new MapCoordinate (2, 2));
        }

        // second move of the game and opponent occupied the center
        if (count ($availableMoves) == 8 && 
                   !$this->getMap ()->isMapAvailable (new MapCoordinate (2, 2))) {
                   
            $corners = array (
                new MapCoordinate (1, 1),
                new MapCoordinate (1, 3),
                new MapCoordinate (3, 1),
                new MapCoordinate (3, 3)
            );

            return array (-1, $corners [array_rand ($corners)]);
        }

        // I will start with the minimum score and try to increase it.
        // The opponent starts with the maximum score and tries to decrease it.
        if ($myTurn) {
            $bestScore = PHP_INT_MIN;
            $currentMark = $this->getMyMark ();
        } else {
            $bestScore = PHP_INT_MAX;
            $currentMark = $this->getOppMark ();
        }

        $currentScore = 0;
        $bestMove = null;

        // If no available moves or it is the final level of recursivity,
        // the best score is whatever the map says it is at this moment
        if (empty ($availableMoves) || $level = 0) {
            $bestScore = $this->evaluate ();
        } else {
            foreach ($availableMoves as $index => $position) {
                // try this move for the current player
                $this->getMap ()->setMarksCell ($position, $currentMark);

                // If I am the current player, try to maximize the score.
                // Otherwise, the opponent will try to minimize the score.
                if ($myTurn) {
                    $currentScore = $this->getBestMove ($level - 1, false) [0];
                    if ($currentScore > $bestScore) {
                        $bestScore = $currentScore;
                        $bestMove = $position;
                    }
                } else {
                    $currentScore = $this->getBestMove ($level - 1, true) [0];
                    if ($currentScore < $bestScore) {
                        $bestScore = $currentScore;
                        $bestMove = $position;
                    }
                }

                // erase the hypothetical and temporary move
                $this->getMap ()->erase ($position);
            }
        }

        return array ($bestScore, $bestMove);
    }
}
