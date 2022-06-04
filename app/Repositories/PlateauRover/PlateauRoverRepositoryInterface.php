<?php

namespace App\Repositories\PlateauRover;

interface PlateauRoverRepositoryInterface
{
    public function createRoverByPlateau(array $data, int $plateauId);
    public function findRoversByPlateauId(int $plateauId);
}
