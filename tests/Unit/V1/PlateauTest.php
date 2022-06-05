<?php

namespace Tests\Unit\V1;

use App\Models\Plateau;
use Illuminate\Support\Str;
use Tests\TestCase;

class PlateauTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_plateau()
    {
        $response = $this->post('/api/v1/plateaus', [
            'name' => Str::random(50),
            'x_coordinate' => rand(0, 1000),
            'y_coordinate' => rand(0, 1000),

        ]);
        $response->assertStatus(201);
    }

    public function test_get_plateaus(){
        $response = $this->get('/api/v1/plateaus', []);
        $response->assertStatus(200);
    }

    public function test_find_plateau_by_id(){
        $plateau = Plateau::factory()->create();
        $response = $this->get("api/v1/plateaus/{$plateau->id}");
        $response->assertStatus(200);
    }
}
