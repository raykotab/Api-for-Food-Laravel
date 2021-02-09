<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dishes', [DishController::class, 'index'])->name('index');
Route::get('/dishes/{id}', [DishController::class, 'show'])->name('showDish');
Route::post('/dishes', [DishController::class, 'store'])->name('storeDish');
Route::put('/dishes/{id}', [DishController::class, 'update'])->name('updateDish');


//Route::resource('dishes, DishController::class); para que te haga las rutas automaticas, puede hacer de mas.