<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class DishTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_shows_one_dish()
    {
        $dish = Dish::factory()->create(['name' => "Papa"]);
        $response = $this->get(route('showDish', $dish->id));
        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => "Papa"]);
    }
}
