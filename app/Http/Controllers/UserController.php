<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function showHomeUserLogin($id, Request $request)
    {
        $cookieValue = $request->cookie('userId');
        if (!$cookieValue) {
            return redirect('/login')->withErrors(['message' => 'Kamu belum Login!!!']);
        }
        if ($id !== $cookieValue) {
            return redirect('/')->withErrors(['message' => 'Autentikasi gagal!!!']);
        }
        $user = UsersModel::find($id);
        return view('user/homeUserLogin', compact(['user']));
    }
    public function edit($id, Request $request)
    {
        $requestData = $request->all();

    }
    public function showFormEdit($id)
    {
        $user = UsersModel::find($id);

        return view('user/editUserProfile', compact(['user']));
    }

    public function logout()
    {
        return redirect('/')->withCookie(Cookie::forget('userId'));
    }
}