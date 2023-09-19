<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function showHomeUser($id, Request $request)
    {

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