<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\AuthController;
Use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [AuthController::class, 'user']); 
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);      
});

Route::post('registrer', [AuthController::class, 'registrer']);
Route::post('auth/login', [AuthController::class, 'login']);
//Route::get('users',  [App\Http\Controllers\Api\UserController::class, 'index']);

include_once(__DIR__.'/api/profissions.php');
//include_once(__DIR__.'/api/login.php');

Route::apiResources([
    'service' => ServiceController::class,
]);

