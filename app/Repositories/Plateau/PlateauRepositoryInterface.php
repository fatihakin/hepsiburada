<?php

namespace App\Repositories\Plateau;

interface PlateauRepositoryInterface
{
    public function getAllPlateaus(array $orderDetails);
    public function createPlateau(array $orderDetails);

}
