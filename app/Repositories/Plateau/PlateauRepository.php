<?php

namespace App\Repositories\Plateau;

use App\Models\Plateau;

class PlateauRepository implements PlateauRepositoryInterface
{

    public function createPlateau(array $data)
    {
        Plateau::query()->create($data);
    }

    public function findById(int $id): Plateau|array|null
    {
        return Plateau::query()->findOrFail($id);
    }
}
