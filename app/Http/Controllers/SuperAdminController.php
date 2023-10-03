<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function showHomeSuperAdmin()
    {
        return view('/super-admin/homeLoginSuperAdmin');
    }
    public function showAllUsers()
    {
        $users = UsersModel::all();
        return view('/super-admin/showAllUsers', ['data' => $users]);
    }
    public function showAllCompanies()
    {
        $companies = CompaniesModel::all();
        return view('/super-admin/showAllCompanies', ['data' => $companies]);
    }
}