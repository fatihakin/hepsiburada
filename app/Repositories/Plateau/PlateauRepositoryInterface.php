<?php

namespace App\Repositories\Plateau;

use App\Models\Plateau;
use phpDocumentor\Reflection\Types\Integer;

interface PlateauRepositoryInterface
{
    public function findById(int $id):Plateau|array|null;
    public function existsById(int $id):bool;
    public function createPlateau(array $data);

}
