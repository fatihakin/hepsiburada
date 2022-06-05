<?php

namespace App\Repositories\RoverState;

interface RoverStateRepositoryInterface
{
    public function getStatesByRover(int $roverId);
}
