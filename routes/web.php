<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/persona',PersonaController::class);