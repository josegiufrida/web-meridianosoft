<?php

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
Route::apiResources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
*/



Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

Route::post('logout', [App\Http\Controllers\Api\LoginController::class, 'logout']);



Route::apiResource('v1.0/clients', App\Http\Controllers\Api\V1\ClientController::class)
    ->only(['show', 'index','store'])
    ->middleware('auth:sanctum');


Route::get('v1.0/filters/{table}', [App\Http\Controllers\Api\V1\FilterController::class, 'getFilters']);



/*
Route::apiResource('v1.0/suppliers', App\Http\Controllers\Api\V1\SupplierController::class)
    ->only(['show', 'index','store'])
    ->middleware('auth:sanctum');*/

