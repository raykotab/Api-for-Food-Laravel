<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class DishUpdateTest extends TestCase
{   use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_dish_is_updated()
    {
        $dish = Dish::factory()->create();
        
        $response = $this->putJson(route('updateDish', $dish->id), [
            'name' => 'name',
            'image' => 'image',
            'description' => 'mmmmmhmmhmmh! so leka, leka!',

        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment(['description' => 'mmmmmhmmhmmh! so leka, leka!']);

    }
}
