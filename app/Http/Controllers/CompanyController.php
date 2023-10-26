<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use App\Models\LamaranModels;
use App\Models\LowonganModels;
use App\Models\pemagang_aktif;
use App\Models\pemagang_inaktif;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function editLowongan(Request $request, $id, $idLowongan)
    {
        $errorMessage = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Posisi pekerjaan belum diisi!',
            'description.required' => 'deskripsi pekerjaan belum diisi!'
        ]);
        if (!$errorMessage) {
            redirect()->back()->withErrors(['message' => $errorMessage]);
        }
        $request->except(['_token']);
        $requestData = $request->all();


        try {
            //code...
            DB::table('lowongan')->where('created_by', '=', $id)->where('id', '=', $idLowongan)->update([
                'title' => $requestData['title'],
                'description' => $requestData['description'],
                'status' => $requestData['status']
            ]);
            return redirect(route('lowongan.all', ['id' => intval($id)]))->with(['message' => 'Lowongan sudah di update']);
        } catch (\Exception $e) {
            return dd($e);
            //throw $th;
        }

    }
    public function tambahLowongan(Request $request, $id)
    {
        $errorMessage = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Posisi pekerjaan belum diisi!',
            'descrption.required' => 'deskripsi pekerjaan belum diisi!'
        ]);
        if (!$errorMessage) {
            redirect()->back()->withErrors(['message' => $errorMessage]);
        }
        $record = CompaniesModel::find($id);
        $id = intval($record->id);
        $request->merge(['created_by' => $id]);

        $requestData = $request->all();
        try {
            //code...
            LowonganModels::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => $id,
                'name' => $record->companyName,
                'profile' => $record->companyProfile,
                'location' => $record->location
            ]);
            return redirect(route('dashboard.company', ['id' => $id]))->with(['success' => 'lowongan berhasil dibuat']);
        } catch (\Exception $e) {
            return dd($e);
        }
    }
    public function editCompany($id, Request $request)
    {
        $errorMessage = $request->validate([
            'nama' => 'required',
            'companyName' => 'required',
            'location' => 'required'
        ], [
            'nama.required' => 'nama harus diisi!',
            'comanyName.required' => 'nama persuahaan harus diisi',
            'location.required' => 'alamat harus diisi'
        ]);
        if (!$errorMessage) {
            return redirect()->back()->withErrors(['message' => $errorMessage]);
        }
        $record = CompaniesModel::find($id);
        if (!$record) {
            return redirect()->back()->withErrors(['message' => 'something wrong try again later']);
        }
        $requestData = $request->all();
        $photo = $request->file('photo');
        if ($photo) {
            $request->validate([
                'photo' => 'max:5000'
            ]);
            $destination = 'photos';
            $fileExists = $record->photo;
            $filePathOld = public_path('photos/' . $fileExists);
            if ($fileExists) {
                unlink($filePathOld);
            }
            $photoName = md5($photo->getClientOriginalName()) . '.' . $photo->getClientOriginalExtension();
            if ($photo->move($destination, $photoName)) {
                DB::table('companies')
                    ->where('id', $id) // Replace 'id' with the column name you want to use for the update condition
                    ->update([
                        'photo' => $photoName
                        // Update other fields as needed
                    ]);
            } else {
                return redirect()->back()->withErrors('upload pdf gagal');
            }
        }
        try {
            DB::table('companies')->where(['id' => $id])->update([
                'nama' => $requestData['nama'],
                'companyName' => $requestData['companyName'],
                'companyProfile' => $requestData['companyProfile'],
                'location' => $requestData['location']
            ]);
            DB::table('lowongan')->where(['created_by' => $id])->update([
                'name' => $requestData['companyName'],
                'profile' => $requestData['companyProfile'],
                'location' => $requestData['location']
            ]);

            return redirect(route('dashboard.company', ['id' => $id]))->with(['message' => 'Profil berhasil di edit']);

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }

    public function deleteLowongan(Request $request, $id, $idLowongan)
    {
        try {
            //code...
            DB::table('lowongan')
                ->where('created_by', '=', $id)
                ->where('id', '=', $idLowongan)
                ->delete();
            return redirect(route('lowongan.all', ['id' => intval($id)]))->with(['message' => 'Lowongan sudah di hapus']);
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }

    }
    public function handleDecision(Request $request, $id, $idLamaran, $decision)
    {
        if ($decision == 'accept') {
            DB::table('lamaran')->where('id', '=', $idLamaran)->update([
                'status' => 'accepted'
            ]);
            return redirect()->back()->with(['message' => 'lamaran diterima silahkan hubungi yang bersangkutan']);
        }
        if ($decision == 'decline') {
            DB::table('lamaran')->where('id', '=', $idLamaran)->update([
                'status' => 'declined'
            ]);
            return redirect()->back()->with(['message' => 'yah menolak lamaran, hubungi yang bersangkutan ']);
        }

    }
    public function handlePemagangAktif(Request $request, $id, $idLamaran)
    {
        $company = CompaniesModel::find($id);
        $lamaran = LamaranModels::find($idLamaran);
        $idUser = intval($lamaran->created_by);
        $user = UsersModel::find($idUser);
        $lowongan = LowonganModels::where('title', '=', $lamaran->title_lowongan)->first();
        try {
            //code...
            pemagang_aktif::create([
                'id_company' => $company->id,
                'id_lamaran' => $lamaran->id,
                'id_user' => $user->id,
                'username' => $user->name,
                'posisi' => $lamaran->title_lowongan,
                'email_user' => $user->email,
                'companyname' => $company->companyName
            ]);
            DB::table('lamaran')->where('id', '=', $lamaran->id)->delete();
            return redirect(route('pemagang.aktif', ['id' => $company->id]));
        } catch (\Exception $e) {
            return dd($e);
        }
    }
    public function handleRemovePemegangAktif(Request $request, $id, $idPemagangAktif)
    {
        $company = CompaniesModel::find($id);

        $magang = pemagang_aktif::find($idPemagangAktif);
        $idUser = intval($magang->id_user);
        $user = UsersModel::find($idUser);
        try {
            //code...

            DB::table('pemagang_inaktif')->insert([
                'id_company' => $company->id,
                'id_lamaran' => $magang->id,
                'id_user' => $user->id,
                'username' => $user->name,
                'posisi' => $magang->posisi,
                'email_user' => $user->email,
                'companyname' => $company->companyName,
                'status' => 'inactive'
            ]);



            DB::table('pemagang_aktif')->where('id', '=', $idPemagangAktif)->delete();
            return redirect(route('pemagang.inaktif', ['id' => $company->id]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function handleRemovePemegangInAktif(Request $request, $id, $idPemagangInAktif)
    {
        $company = CompaniesModel::find($id);
        $magang = pemagang_aktif::find($idPemagangInAktif);

        try {
            //code...



            DB::table('pemagang_inaktif')->where('id', '=', $idPemagangInAktif)->delete();
            return redirect(route('pemagang.inaktif', ['id' => $company->id]));

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function logout()
    {
        return redirect('/')->withCookie(Cookie::forget('userId'));
    }
    public function showHomeCompany($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        $lowonganCount = LowonganModels::where('created_by', '=', $id)->count();
        $lamaranCount = LamaranModels::where('company_id', '=', $id)->where('status', '=', 'pending')->count();
        $lamaranAcceptedCount = LamaranModels::where('company_id', '=', $id)->where('status', '=', 'accepted')->count();
        $pemagangAktifCount = pemagang_aktif::where('id_company', '=', $id)->count();
        $pemagangInAktifCount = pemagang_inaktif::where('id_company', '=', $id)->count();
        return view('/admin/homeLoginAdmin', compact('user'), ['lowonganCount' => $lowonganCount, 'lamaranCount' => $lamaranCount, 'lamaranAcceptedCount' => $lamaranAcceptedCount, 'pemagangAktifCount' => $pemagangAktifCount, 'pemagangInAktifCount' => $pemagangInAktifCount]);
    }
    public function showFormTambahLowongan($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        return view('/admin/tambahLowonganAdmin', compact('user'));
    }
    public function showEditCompany($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        return view('/admin/editProfileAdmin', compact('user'));
    }

    public function showEditLowongan($id, $idLowongan, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $admin = CompaniesModel::find($id);
        $lowongan = LowonganModels::find($idLowongan);
        return view('/admin/editLowongan', compact('lowongan'), compact('admin'));
    }
    public function showAllLowongan($id, Request $request)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        $lowongan = LowonganModels::where('created_by', '=', $id)->get();
        return view('/admin/showLowongan', ['data' => $lowongan], compact('user'));
    }
    public function showAllLamaran(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        $lamaran = LamaranModels::where('company_id', '=', $id)->where('status', '=', 'pending')->get();
        return view('/admin/showLamaranUser', ['lamaran' => $lamaran], compact('user'));
    }
    public function showAllLamaranAccepted(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        $lamaran = LamaranModels::where('company_id', '=', $id)->where('status', '=', 'accepted')->get();
        return view('/admin/showLamaranUserAccepted', ['lamaran' => $lamaran], compact('user'));
    }
    public function showAllPemagangAktif(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = CompaniesModel::find($id);
        $aktif = pemagang_aktif::where('id_company', '=', $id)->where('status', '=', 'active')->get();
        return view('/admin/showPemagangAktif', ['data' => $aktif], compact('user'));
    }
    public function showAllPemagangInAktif(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $id = intval($id);
        $user = CompaniesModel::find($id);
        $inaktif = pemagang_inaktif::where('id_company', '=', $id)->get();
        return view('/admin/showPemagangInAktif', compact('user'))->with('data', $inaktif);
    }
}