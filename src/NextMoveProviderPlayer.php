<?php

declare (strict_types = 1);
namespace TicTacToe;

class NextMoveProviderPlayer implements NextMoveProvider {
    /**
     * @var MapCoordinate object (also, it can be null).
     */
    private $position;

    /**
     * @var instanceof ReadOnlyMap
     */
    private $map;

    /**
     * Class constructor
     * @param instanceof ReadOnlyMap
     * @param MapCoordinate object or null
     */
    public function __construct (ReadOnlyMap $map, $position = null) {
        $this->map = $map;
        $this->setPosition ($position);
    }

    /**
     * @return MapCoordinate object or null
     */
    public function getPosition () {
        return $this->position;
    }

    /**
     * @param MapCoordinate object or null
     * @return void
     */
    private function setPosition ($position) : void {
        if ($position !== null && !($position instanceof MapCoordinate)) {
            throw new \DomainException ('The parameter must be a MapCoordinate object or null.');
        }

        if ($position instanceof MapCoordinate) {
            if (!$this->checkMapAvailability ($position)) {
                throw new \Exception ('Player made an unavailable choice.');
            }
        }
        $this->position = $position;
    }

    /**
     * @param MapCoordinate object
     * @return boolean true if the map is available at specified position
     */
    private function checkMapAvailability (MapCoordinate $position) : bool {
        if ($this->map->isMapAvailable ($position->getMapIndex ())) {
            return true;
        }

        return false;
    }
}
