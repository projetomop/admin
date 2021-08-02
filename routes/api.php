<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientAppCrontroller;
use App\Http\Controllers\Api\ProviderAppController;
use App\Models\Service;
Use App\Http\Middleware\VerifyCsrfToken;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Hash;


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);      
});


// Rotas de Registro
Route::post('registrer_client', [AuthController::class, 'registrer_client']);
Route::post('registrer_provider', [AuthController::class, 'registrer_provider']);

// Rotas de Login
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/login_provider', [AuthController::class, 'login_provider']);


Route::post('sanctum/token', [AuthController::class, 'create_token']);
//Route::get('users',  [App\Http\Controllers\Api\UserController::class, 'index']);

include_once(__DIR__.'/api/profissions.php');
//include_once(__DIR__.'/api/login.php');

Route::apiResources([
    'service' => ServiceController::class,
    'proposal' => OfferController::class,
]);

Route::group(['middleware' => ['auth:sanctum']], function() {
    // Rota de cancelamento de proposta
    Route::get('canceled/{id}', function($id){
        $service = Service::where('id', $id)->firstOrFail();
        $service->status = 'canceled';
        $service->update();
        return response()->json($service, 200);
    });
    Route::get('terminate/{id}', function($id){
        $service = Service::where('id', $id)->firstOrFail();
        $service->status = 'marked';
        $service->update();
        return response()->json($service, 200);
    });

});
// Rotas de Edição de Perfil
Route::put('editProfile/{id}', [ClientAppCrontroller::class, 'editClientProfile']);
Route::put('editProviderProfile/{id}', [ProviderAppController::class, 'editProviderProfile']);

