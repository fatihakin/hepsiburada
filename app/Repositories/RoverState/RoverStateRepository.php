<?php

namespace App\Repositories\RoverState;

use App\Models\RoverState;

class RoverStateRepository implements RoverStateRepositoryInterface
{
    public function getStatesByRover(int $roverId)
    {
        return RoverState::query()->where('rover_id',$roverId)
            ->get();
    }
}
