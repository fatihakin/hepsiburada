<?php

namespace App\Repositories\Plateau;

use phpDocumentor\Reflection\Types\Integer;

interface PlateauRepositoryInterface
{
    public function findById(int $id);
    public function createPlateau(array $data);

}
