<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showHomeCompany()
    {
        return view('/admin/homeLoginAdmin');
    }
}