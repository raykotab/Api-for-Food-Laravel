<?php

namespace Tests\Feature;

use App\Models\Dish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class DishDeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_dish_is_deleted()
    {
        $dish = Dish::factory()->create();
        
        $response = $this->deleteJson(route('deleteDish', $dish->id));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('dishes', [ 'name' => $dish->name]);

    }
}
