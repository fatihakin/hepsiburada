<?php

namespace App\Repositories\Plateau;

use App\Models\Plateau;
use Illuminate\Database\Eloquent\Collection;

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

    public function existsById(int $id): bool
    {
        return Plateau::query()
            ->where('id', $id)
            ->exists();
    }

    public function getAll(): Collection
    {
        return Plateau::query()->get();
    }
}
