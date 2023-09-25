<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomMiddleware;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{


    public function showHomeUser($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::find($id);
        return view('user/homeUserLogin', compact(['user']));

    }
    public function edit($id, Request $request)
    {
        $requestData = $request->all();
        $errorMessage = $requestData['errorMessage'];
        if (!$errorMessage) {
            return redirect()->back()->withErrors(['message' => $errorMessage]);
        }
        $record = UsersModel::find($id);
        if (!$record) {
            return redirect()->back()->withErrors(['message' => 'something wrong please try again later!']);
        }

        $pdf = $request->file('cv');
        if ($pdf) {
            $destination = 'pdfs';
            $request->validate([
                'cv' => 'mimes:pdf|max:2048'
            ]);
            $pdfName = $record->name . '_' . $record->id . '.' . $pdf->getClientOriginalExtension();
            if ($pdf->move($destination, $pdfName)) {
                DB::table('users')
                    ->where('id', $id) // Replace 'id' with the column name you want to use for the update condition
                    ->update([
                        'cv' => $pdfName
                        // Update other fields as needed
                    ]);
            } else {
                return redirect()->back()->withErrors('upload pdf gagal');
            }
        }





        try {
            DB::table('users')
                ->where('id', $id) // Replace 'id' with the column name you want to use for the update condition
                ->update([
                    'name' => $requestData['name'],
                    'school' => $requestData['school'],
                    'notelp' => $requestData['notelp'],
                    // Update other fields as needed
                ]);
            return redirect('/user' . '/' . $id . '/edit')->with('message', 'update berhasil!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['message' => 'update gagal']);
        }


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

    public function showLowongan($id)
    {
        return view('/user/showAllLowongan');
    }
    public function showLowonganUser($id)
    {
        return view('/user/showLowonganUser');
    }
}