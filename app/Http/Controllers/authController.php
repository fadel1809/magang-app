<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class authController extends Controller
{
    public function loginCompany(Request $request)
    {

    }
    public function registerCompany()
    {

    }
    public function login(Request $request)
    {
        $requestData = $request->all();
        $errorMessage = $requestData['errorMessage'];
        if (!$errorMessage) {
            return redirect('/login')->withErrors(['message' => $errorMessage]);

        }
        $email = $requestData['email'];
        $userEmail = UsersModel::where('email', $email)->first();
        if (!$userEmail) {
            return redirect('/login')->withErrors(['message' => 'email tidak ditemukan!']);
        }
        $userPass = $requestData['password'];
        $passwordDB = $userEmail['password'];
        $id = $userEmail['id'];
        $role = $userEmail['role'];
        if (Hash::check($userPass, $passwordDB)) {
            if ($role == 'superAdmin') {
                $oneDay = 60 * 24;
                Cookie::queue('userId', $id, $oneDay);
                return redirect('/' . 'super-admin/' . $id);
            }
            $oneDay = 60 * 24;
            Cookie::queue('userId', $id, $oneDay);
            return redirect('/user' . '/' . $id)->withErrors(['message' => 'password checked']);
        } else {
            return redirect('/login')->withErrors(['message' => 'Password salah']);
        }

    }
    public function register(Request $request)
    {
        $requestData = $request->all();
        $password = $requestData['password'];
        $hashedPassword = Hash::make($password, ['rounds' => 12]);
        $requestData['password'] = $hashedPassword;
        $errorMessage = $requestData['errorMessage'];
        $user = UsersModel::create($requestData);
        if (!$user) {
            return redirect()->back()->withErrors(['message' => $errorMessage]);
        }
        return redirect('/login');
    }
    public function showRegisterForm()
    {
        return view('register');
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function showLoginCompanyForm()
    {
        return view('loginCompany');
    }
    public function showRegisterCompanyForm()
    {
        return view('registerCompany');
    }
}