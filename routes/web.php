<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdminController;
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



//route auth company
Route::get('/company-login', [authController::class, 'showLoginCompanyForm']);
Route::get('/company-register', [authController::class, 'showRegisterCompanyForm']);
Route::middleware('inputLoginCompany')->post('/company-login', [authController::class, 'loginCompany']);
Route::middleware('inputRegisterCompany')->post('/company-register', [authController::class, 'registerCompany']);

//route company
Route::get('/company/{id}', [CompanyController::class, 'showHomeCompany']);
Route::post('/company/{id}', [CompanyController::class, 'logout'])->name('company.logout');
Route::get('/company/{id}/edit', [CompanyController::class, 'showEditCompany']);
Route::put('/company/{id}/edit', [CompanyController::class, 'editCompany'])->name('company.edit.profile');
Route::get('/company/{id}/tambah-lowongan', [CompanyController::class, 'showFormTambahLowongan'])->name('company.tambah');
Route::post('/company/{id}/tambah-lowongan', [CompanyController::class, 'tambahLowongan'])->name('company.tambah');
Route::get('/company/{id}/edit-lowongan/{idLowongan}', [CompanyController::class, 'showEditLowongan'])->name('lowongan.edit');
Route::put('/company/{id}/edit-lowongan/{idLowongan}', [CompanyController::class, 'editLowongan'])->name('lowongan.edit');
Route::get('/company/{id}/all-lowongan', [CompanyController::class, 'showAllLowongan'])->name('lowongan.all');
Route::delete('/company/{id}/delete-lowongan/{idLowongan}', [CompanyController::class, 'deleteLowongan'])->name('lowongan.delete');
Route::get('/company/{id}/all-lamaran', [CompanyController::class, 'showAllLamaran'])->name('lamaran.pending');
Route::put('/company/{id}/all-lamaran/{idLamaran}/{decision}', [CompanyController::class, 'handleDecision'])->name('lamaran.decision');
Route::get('/company/{id}/all-lamaran-accepted', [CompanyController::class, 'showAllLamaranAccepted'])->name('lamaran.accepted');
Route::post('/company/{id}/all-lamaran-accepted/{idLamaran}', [CompanyController::class, 'handlePemagangAktif'])->name('lamaran.pemagang.aktif');
Route::get('/company/{id}/pemagang-aktif', [CompanyController::class, 'showAllPemagangAktif'])->name('pemagang.aktif');
Route::put('/company/{id}/pemagang-aktif/{idPemagangAktif}', [CompanyController::class, 'handleRemovePemegangAktif'])->name('pemagang.aktif.remove');
Route::get('/company/{id}/pemagang-inaktif', [CompanyController::class, 'showAllPemagangInAktif'])->name('pemagang.inaktif');
Route::put('/company/{id}/pemagang-inaktif/{idPemagangInAktif}', [CompanyController::class, 'handleRemovePemegangInAktif'])->name('pemagang.inaktif.remove');

//route auth
Route::middleware('InputLoginValidation')->post('/login', [authController::class, 'login']);
Route::middleware('InputRegistrationValidation')->post('/register', [authController::class, 'register']);
Route::get('/register', [authController::class, 'showRegisterForm']);
Route::get('/login', [authController::class, 'showLoginForm']);

//route user
Route::middleware('SecurePageValidation')->get('/user/{id}', [UserController::class, 'showHomeUser']);
Route::middleware('SecurePageValidation')->get('/user/{id}/edit', [UserController::class, 'showFormEdit'])->name('user.edit');
Route::middleware('editUserValidation')->put('/user/{id}/edit', [UserController::class, 'edit']);
Route::middleware('SecurePageValidation')->get('/download-pdf/{id}/{filename}', [UserController::class, 'downloadPDF'])->name('download.pdf');
Route::post('/user/{id}/logout', [UserController::class, 'logout']);
Route::middleware('SecurePageValidation')->get('/user/{id}/lowongan', [UserController::class, 'showLowongan']);
Route::middleware('SecurePageValidation')->get('/user/{id}/lowongan/{idLowongan}', [UserController::class, 'showLowonganPage'])->name('lowongan.page');
Route::middleware('SecurePageValidation')->get('/user/{id}/lowongan-user', [UserController::class, 'showLowonganUser'])->name('lowongan.user');
Route::post('/user/{id}/lowongan/{idLowongan}', [UserController::class, 'lamarLowongan'])->name('lamar.lowongan');


//route super admin
Route::get('/super-admin/{id}', [SuperAdminController::class, 'showHomeSuperAdmin'])->name('superadmin.home');
Route::get('/super-admin/{id}/all-users', [SuperAdminController::class, 'showAllUsers'])->name('superadmin.users');
Route::get('/super-admin/{id}/all-companies', [SuperAdminController::class, 'showAllCompanies'])->name('superadmin.companies');