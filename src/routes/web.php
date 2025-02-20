<?php

use App\Http\Controllers\PreSignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/pre-signup', PreSignupController::class);
Route::get('/pre-signup', [PreSignupController::class, 'create']);
Route::post('/pre-signup', [PreSignupController::class, 'store']);

Route::get('/signup', [SignupController::class, 'create']);
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/signin', [SigninController::class, 'create']);
Route::post('/signin', [SigninController::class, 'show']);
