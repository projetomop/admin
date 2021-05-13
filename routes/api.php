<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;

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

// Route::middleware(middleware: 'auth:sanctun')->group(function() {
//     Route::get('/user', [App\Http\Controllers\Api\AuthController::class, 'user']);      
// });

Route::middleware('auth:sanctum')->get('/user', [App\Http\Controllers\Api\AuthController::class, 'user']); 
Route::post('registrer', [App\Http\Controllers\Api\AuthController::class, 'registrer']);
Route::post('auth/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']); 
//Route::get('users',  [App\Http\Controllers\Api\UserController::class, 'index']);

include_once(__DIR__.'/api/profissions.php');
//include_once(__DIR__.'/api/login.php');

Route::apiResources([
    'service' => ServiceController::class,
]);

