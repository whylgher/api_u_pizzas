<?php

use App\Http\Controllers\AdditionalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorderController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\FindByTokenController;
use App\Http\Controllers\ImagePizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PricePizzaController;
use App\Http\Controllers\TodoController;

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

Route::get('/user', FindByTokenController::class);
Route::post('/upload_image_pizza', ImagePizzaController::class);
Route::post('/set_price_pizza', PricePizzaController::class);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::put('confirm_login', 'confirmLogin');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('order/create', 'store');
    Route::get('orders', 'index');
    Route::get('order/client/{id}', 'showIdUser');
    Route::get('order/{id}', 'show');
});

Route::controller(DrinkController::class)->group(function () {
    Route::post('drink/create', 'store');
    Route::get('drink', 'index');
});

Route::controller(PizzaController::class)->group(function () {
    Route::post('create', 'create');
    Route::get('pizzas', 'index');
    Route::get('pizza/{id}', 'show');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});

Route::controller(AdditionalController::class)->group(function () {
    Route::post('additional/create', 'create');
    Route::put('additional/update/{id}', 'update');
    Route::get('additional', 'index');
});

Route::controller(BorderController::class)->group(function () {
    Route::post('border/create', 'create');
    Route::put('border/update/{id}', 'update');
    Route::get('border', 'index');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
