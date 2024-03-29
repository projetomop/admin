<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vendor.adminlte.auth.login');
});

Route::resource('clientes', 'App\Http\Controllers\ClientController')->names('client')->parameters(['clientes' => 'client']);

Route::resource('prestador', 'App\Http\Controllers\ProviderController')->names('provider')->parameters(['prestador' => 'provider']);

Route::get('/prestador/{provider}/{confirmed}',[App\Http\Controllers\ProviderController::class, 'confirmed'])->name('provider.confirmed');
Route::resource('profissoes', 'App\Http\Controllers\ProfissionController')->names('profission')->parameters(['profissao' => 'profission']);

Route::get('/teste', function(){
    return view('test');
});

Route::get('messages',  [App\Http\Controllers\ChatController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


