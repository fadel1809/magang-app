<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use App\Models\UsersModel;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Stmt\TryCatch;

class authController extends Controller
{
    public function loginCompany(Request $request)
    {
        $requestData = $request->all();
        $errorMessage = $requestData['errorMessage'];
        if (!$errorMessage) {
            return redirect('/company-login')->withErrors(['message' => $errorMessage]);

        }
        $email = $requestData['email'];
        $companyEmail = CompaniesModel::where('email', $email)->first();
        if (!$companyEmail) {
            return redirect('/company-login')->withErrors(['message' => 'email tidak ditemukan!']);
        }
        $userPass = $requestData['password'];
        $passwordDB = $companyEmail['password'];
        $id = $companyEmail['id'];

        if (Hash::check($userPass, $passwordDB)) {
            $oneDay = 60 * 24;
            Cookie::queue('userId', $id, $oneDay);
            if ($companyEmail['status'] != 'accept') {
                return redirect(route('company.login'))->withErrors(['message' => 'akun sedang di cek,Tunggu admin menghubungi via email atau telepon']);
            }
            return redirect('/company' . '/' . $id);
        } else {
            return redirect('/company-login')->withErrors(['message' => 'Password salah']);
        }
    }
    public function registerCompany(Request $request)
    {
        $requestData = $request->all();

        $errorMessage = $requestData['errorMessage'];
        if (!$errorMessage) {
            return redirect('/company-register')->withErrors(['message' => $errorMessage]);
        }

        $password = $requestData['password'];
        $hashedPassword = Hash::make($password, ['rounds' => 12]);
        $requestData['password'] = $hashedPassword;
        try {
            //code...
            CompaniesModel::create($requestData);
            return redirect('/company-login');
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }

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
                return redirect(route('superadmin.home', ['id' => $id]));
            }
            $oneDay = 60 * 24;
            Cookie::queue('userId', $id, $oneDay);
            return redirect('/user' . '/' . $id);
        } else {
            return redirect('/login')->withErrors(['message' => 'Password salah']);
        }

    }
    public function register(Request $request)
    {
        $requestData = $request->all();

        $errorMessage = $requestData['errorMessage'];
        if (!$errorMessage) {
            return redirect('/register')->withErrors(['message' => $errorMessage]);
        }

        $password = $requestData['password'];
        $hashedPassword = Hash::make($password, ['rounds' => 12]);
        $requestData['password'] = $hashedPassword;
        $user = UsersModel::create($requestData);

        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'something went wrong']);
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