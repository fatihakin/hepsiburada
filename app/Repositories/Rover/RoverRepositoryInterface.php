<?php

namespace App\Repositories\Rover;

use App\Models\Rover;

interface RoverRepositoryInterface
{
    public function findById(int $id): Rover|array|null;

    public function findByIdWithPlateau(int $id): Rover|array|null;

    public function createRover(array $data);
}
