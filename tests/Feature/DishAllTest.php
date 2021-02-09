<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class DishAllTest extends TestCase
{ 
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_shows_all_dishes()
    {
        Dish::factory(5)->create();
        $response = $this->get(route('index'));
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    
}
