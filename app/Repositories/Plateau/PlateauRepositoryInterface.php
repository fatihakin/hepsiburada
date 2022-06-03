<?php

namespace App\Repositories\Plateau;

interface PlateauRepositoryInterface
{
    public function getAllPlateaus();
    public function createPlateau(array $data);

}
