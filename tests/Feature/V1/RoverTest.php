<?php

namespace Tests\Feature\V1;

use App\Models\Plateau;
use App\Models\Rover;
use Tests\TestCase;

class RoverTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_rover_state_case1()
    {
        $plateau = Plateau::factory()->create();
        $rover = Rover::query()->create([
            'plateau_id' => $plateau->id,
            'name' => uniqid(),
            'x_coordinate' => 0,
            'y_coordinate' => 0,
            'facing' => 'N',

        ]);
        $response = $this->put("api/v1/rovers/{$rover->id}/update-state", [
            'commands' => 'RMLML'
        ]);//1,2
        $rover = Rover::query()->find($rover->id);
        $this->assertTrue($rover->x_coordinate == 1 && $rover->y_coordinate == 2);
    }

    public function test_update_rover_state_case2()
    {
        $plateau = Plateau::factory()->create();
        $rover = Rover::query()->create([
            'plateau_id' => $plateau->id,
            'name' => uniqid(),
            'x_coordinate' => 0,
            'y_coordinate' => 0,
            'facing' => 'N',

        ]);
        $response = $this->put("api/v1/rovers/{$rover->id}/update-state", [
            'commands' => 'RLMLRRLMMMMLRLMLMLRRLMLLMLRLMRLLLLRRRMLMLLRMLMRL'
        ]);//1,2\

        $rover = Rover::query()->find($rover->id);
        $this->assertTrue($rover->x_coordinate == 4 && $rover->y_coordinate == 9);
    }
    public function test_update_rover_state_case3()
    {
        $plateau = Plateau::factory()->create();
        $rover = Rover::query()->create([
            'plateau_id' => $plateau->id,
            'name' => uniqid(),
            'x_coordinate' => 0,
            'y_coordinate' => 0,
            'facing' => 'N',

        ]);
        $response = $this->put("api/v1/rovers/{$rover->id}/update-state", [
            'commands' => 'LMLMLMLMM'
        ]);

        $rover = Rover::query()->find($rover->id);
        $this->assertTrue($rover->x_coordinate == 2 && $rover->y_coordinate == 3);
    }
}
