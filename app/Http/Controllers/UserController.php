<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomMiddleware;
use App\Models\LamaranModels;
use App\Models\LowonganModels;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



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
    public function downloadPDF($id, $filename)
    {
        // Define the path to the PDF file
        $filePath = public_path('pdfs/' . $filename);
        return response()->download($filePath);


    }
    public function edit($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
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
            $request->validate([
                'cv' => 'mimes:pdf|max:2048'
            ]);
            $destination = 'pdfs';
            $fileExists = $record->cv;
            $filePathOld = public_path('pdfs/' . $fileExists);
            if ($fileExists) {
                unlink($filePathOld);
            }
            $pdfName = md5($pdf->getClientOriginalName()) . '.' . $pdf->getClientOriginalExtension();
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
    public function lamarLowongan(Request $request, $id, $idLowongan)
    {
        $user = UsersModel::find($id);
        $lowongan = LowonganModels::find($idLowongan);
        if (!$user->cv) {
            return redirect(route('user.edit', ['id' => $user->id]))->withErrors(['message' => 'Upload CV terlebih dahulu!']);
        }
        try {
            //code...
            LamaranModels::create([
                'id_lowongan' => $lowongan->id,
                'title_lowongan' => $lowongan->title,
                'location' => $lowongan->location,
                'company_id' => $lowongan->created_by,
                'company' => $lowongan->name,
                'created_by' => $user->id,
                'email_user' => $user->email,
                'cv_user' => $user->cv
            ]);
            return redirect(route('lowongan.user', ['id' => $id]))->with(['message' => 'Berhasil melamar di' . $lowongan->name]);
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function showFormEdit($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::find($id);
        return view('user/editUserProfile', compact(['user']));
    }

    public function logout()
    {
        return redirect('/')->withCookie(Cookie::forget('userId'));
    }

    public function showLowongan(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::find($id);
        $lowongan = LowonganModels::all();
        return view('/user/showAllLowongan', ['lowongan' => $lowongan], compact('user'));
    }
    public function showLowonganPage(Request $request, $id, $idLowongan)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::find($id);
        $lowongan = LowonganModels::find($idLowongan);
        return view('/user/lowonganPage', compact('lowongan'), compact('user'));
    }
    public function showLowonganUser(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $lamaran = LamaranModels::where('created_by', '=', $id)->get();
        $user = UsersModel::find($id);

        return view('/user/showLowonganUser', compact('user'), ['lamaran' => $lamaran]);
    }
}