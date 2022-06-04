<?php

namespace App\Repositories\Rover;

use App\Models\Rover;

class RoverRepository implements RoverRepositoryInterface
{
    public function createRover(array $data)
    {
        Rover::query()->create($data);
    }

    public function findById(int $id): Rover|array|null
    {
        return Rover::query()
            ->findOrFail($id);
    }

    public function findByIdWithPlateau(int $id): Rover|array|null
    {
        return Rover::query()
            ->with('plateau')
            ->findOrFail($id);
    }
}
