<?php

namespace App\Repositories\Rover;

interface RoverRepositoryInterface
{
    public function findById(int $id);
    public function createRover(array $data);
}
