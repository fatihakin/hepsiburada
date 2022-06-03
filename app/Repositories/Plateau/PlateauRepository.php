<?php

namespace App\Repositories\Plateau;

use App\Models\Plateau;

class PlateauRepository implements PlateauRepositoryInterface
{
    public function getAllPlateaus()
    {
        // TODO: Implement getAllPlateaus() method.
    }

    public function createPlateau(array $data)
    {
        Plateau::query()->create($data);
    }
}
