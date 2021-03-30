<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Profission;

Route::get('profissions', function () {
    return Profission::all();
});

