<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoffeeShopController;

// Ruta para obtener todos los CoffeeShops
Route::get('/coffeeshops', [CoffeeShopController::class, 'index']);

// Ruta para obtener un CoffeeShop específico por ID
Route::get('/coffeeshops/{id}', [CoffeeShopController::class, 'show']);

// Ruta para crear un nuevo CoffeeShop
Route::post('/coffeeshops', [CoffeeShopController::class, 'store']);

// Ruta para actualizar un CoffeeShop específico por ID
Route::put('/coffeeshops/{id}', [CoffeeShopController::class, 'update']);

// Ruta para eliminar un CoffeeShop específico por ID
Route::delete('/coffeeshops/{id}', [CoffeeShopController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
