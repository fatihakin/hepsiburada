<?php

namespace Tests\Unit\V1;

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
    public function test_find_rover_by_id()
    {
        $rover = Rover::factory()->create();
        $response = $this->get("api/v1/rovers/{$rover->id}");

        $response->assertStatus(200);
    }

    public function test_update_rover_state()
    {
        $rover = Rover::factory()->create();
        $response = $this->put("api/v1/rovers/{$rover->id}/update-state", [
            'commands' => 'LMLMRML'
        ]);

        $response->assertStatus(200);
    }
}
