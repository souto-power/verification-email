<?php

use App\Http\Controllers\PreSignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/pre-signup', PreSignupController::class);
Route::get('/pre-signup', [PreSignupController::class, 'index']);
Route::post('/pre-signup', [PreSignupController::class, 'register']);

