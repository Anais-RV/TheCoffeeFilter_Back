<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeShopController;
use App\Http\Controllers\AuthController;

// Rutas públicas
Route::get('/coffeeshops', [CoffeeShopController::class, 'index']);
Route::get('/coffeeshops/{id}', [CoffeeShopController::class, 'show']);

// Ruta de login para el administrador (esta no necesita estar protegida)
Route::post('admin/login', [AuthController::class, 'login']);

// Grupo de rutas para administradores
Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function() {
    // Rutas para manipular CoffeeShops
    Route::post('/coffeeshops', [CoffeeShopController::class, 'store']);
    Route::put('/coffeeshops/{id}', [CoffeeShopController::class, 'update']);
    Route::delete('/coffeeshops/{id}', [CoffeeShopController::class, 'destroy']);

    // Ruta para obtener el usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
