<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class authController extends Controller
{
    public function login(Request $request, $errorMessage)
    {

        if (!$errorMessage) {
            return redirect()->back()->withErrors(['message' => $errorMessage]);

        }
        $requestData = $request->all();
        $email = $requestData['email'];
        $userEmail = UsersModel::where('email', $email)->first();
        if (!$userEmail) {
            return redirect()->back()->withErrors(['message' => 'email tidak ditemukan!']);
        }
        $userPass = $requestData['password'];
        $passwordDB = $userEmail['password'];
        $id = $userEmail['id'];
        $role = $userEmail['role'];
        if (Hash::check($userPass, $passwordDB)) {
            if ($role == 'admin') {
                $oneDay = 60 * 24;
                Cookie::queue('userId', $id, $oneDay);
                return redirect('admin/' . $id);
            }
            if ($role == 'superAdmin') {
                $oneDay = 60 * 24;
                Cookie::queue('userId', $id, $oneDay);
                return redirect('super-admin/' . $id);
            }
            $oneDay = 60 * 24;
            Cookie::queue('userId', $id, $oneDay);
            return redirect('user/' . $id);
        } else {
            return redirect()->back()->withErrors(['message' => 'Password salah']);
        }
    }
    public function register(Request $request, $errorMessage)
    {
        $requestData = $request->all();
        $password = $requestData['password'];
        $hashedPassword = Hash::make($password, ['rounds' => 12]);
        $requestData['password'] = $hashedPassword;
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
}