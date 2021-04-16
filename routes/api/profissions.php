<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Profission;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

Route::get('profissions', function () {
    return Profission::all();
});



