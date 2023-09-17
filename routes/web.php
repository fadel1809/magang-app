<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::middleware('InputLoginValidation')->post('/login', [authController::class, 'login']);
Route::middleware('InputRegistrationValidation')->post('/register', [authController::class, 'register']);
Route::get('/register', [authController::class, 'showRegisterForm']);
Route::get('/login', [authController::class, 'showLoginForm']);


Route::middleware('SecurePage:id,')->get('user/{id}', 'UserController@id');

Route::middleware('SecurePage:id')->get('/user/{id}/edit', [UserController::class, 'showFormEdit']);
Route::post('/user/{id}/logout', [UserController::class, 'logout']);
Route::middleware('SecurePage:id')->get('/user/{id}/lowongan', [UserController::class, 'showLowongan']);