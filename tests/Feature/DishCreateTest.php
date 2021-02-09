<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class DishCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_dish_is_created()
    {
        $newDishData = [
            'name' => 'Babaganush',
            'image' => 'https://feelgoodfoodie.net/wp-content/uploads/2018/09/Baba-Ganoush-8.jpg',
            'description' => 'leka leka mmmmmmh!'
        ];
        
        $response = $this->post(route('storeDish'), $newDishData);

        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'Babaganush']);
        $this->assertdatabasehas('dishes', ['name' => 'Babaganush']);

    }
}
