<?php

namespace App\Repositories\PlateauRover;

use App\Models\Rover;
use Illuminate\Support\Collection;

class PlateauRoverRepository implements PlateauRoverRepositoryInterface
{

    public function createRoverByPlateau(array $data, int $plateauId)
    {
        $data['plateau_id'] = $plateauId;
        Rover::query()->create($data);
    }

    public function getRoversByPlateauId(int $plateauId): Collection|array
    {
        return Rover::query()
            ->with('plateau')
            ->where('plateau_id', $plateauId)
            ->get();
    }

}
