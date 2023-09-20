<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CompanyController;
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

Route::get('/company-login', [authController::class, 'showLoginCompanyForm']);
Route::get('/company-register', [authController::class, 'showRegisterCompanyForm']);
Route::middleware('inputLoginCompany')->post('/company-login', [authController::class, 'loginCompany']);
Route::middleware('inputRegisterCompany')->post('/company-register', [authController::class, 'registerCompany']);
Route::get('/company/{id}', [CompanyController::class, 'showHomeCompany']);


Route::middleware('InputLoginValidation')->post('/login', [authController::class, 'login']);
Route::middleware('InputRegistrationValidation')->post('/register', [authController::class, 'register']);
Route::get('/register', [authController::class, 'showRegisterForm']);
Route::get('/login', [authController::class, 'showLoginForm']);


Route::middleware('SecurePageValidation')->get('/user/{id}', [UserController::class, 'showHomeUser']);

Route::middleware('SecurePage:id')->get('/user/{id}/edit', [UserController::class, 'showFormEdit']);
Route::post('/user/{id}/logout', [UserController::class, 'logout']);
Route::middleware('SecurePage:id')->get('/user/{id}/lowongan', [UserController::class, 'showLowongan']);