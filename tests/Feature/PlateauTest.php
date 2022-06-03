<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $response=$this->post('/api/v1/plateaus', [
            'name'=>Str::random(50),
            'x_coordinate'=>rand(0,1000),
            'y_coordinate'=>rand(0,1000),

        ]);

        $response->assertStatus(201);
    }
}
