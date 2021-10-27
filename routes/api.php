<?php

use App\Http\Controllers\Api\CleanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Log in
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login'])
    ->middleware('matinance');

// Log out
Route::post('logout', [App\Http\Controllers\Api\LoginController::class, 'logout'])
    ->middleware('auth:sanctum');




// Update collections
Route::post('v1.0/update', [App\Http\Controllers\Api\V1\UpdateController::class, 'update'])
    ->middleware(['matinance', 'update']);




// Clientes -- Show & Index & Search
Route::apiResource('v1.0/clientes', App\Http\Controllers\Api\V1\ClientController::class)
    ->only(['show', 'index'])
    ->middleware(['matinance', 'auth:sanctum', 'permission:clientes']);

// Proveedores -- Show & Index & Search
Route::apiResource('v1.0/proveedores', App\Http\Controllers\Api\V1\SupplierController::class)
    ->only(['show', 'index'])
    ->middleware(['matinance', 'auth:sanctum', 'permission:proveedores']);

// Articulos -- Show & Index & Search
Route::apiResource('v1.0/articulos', App\Http\Controllers\Api\V1\ProductController::class)
    ->only(['show', 'index'])
    ->middleware(['matinance', 'auth:sanctum', 'permission:articulos']);




// Filters
Route::get('v1.0/filtros/{table}', [App\Http\Controllers\Api\V1\FilterController::class, 'getFilters'])
    ->middleware(['matinance', 'auth:sanctum']);

