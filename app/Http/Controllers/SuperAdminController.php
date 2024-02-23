<?php

namespace App\Http\Controllers;

use App\Models\CompaniesModel;
use App\Models\LamaranModels;
use App\Models\LowonganModels;
use App\Models\pemagang_aktif;
use App\Models\pemagang_inaktif;
use App\Models\UsersModel;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{

    public function editCompany(Request $request, $id, $idCompany)
    {
        $record = CompaniesModel::find($idCompany);
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
            DB::table('companies')->where(['id' => $idCompany])->update([
                'nama' => $requestData['nama'],
                'companyName' => $requestData['companyName'],
                'companyProfile' => $requestData['companyProfile'],
                'location' => $requestData['location']
            ]);
            DB::table('lowongan')->where(['created_by' => $idCompany])->update([
                'name' => $requestData['companyName'],
                'profile' => $requestData['companyProfile'],
                'location' => $requestData['location']
            ]);

            return redirect(route('superadmin.companies', ['id' => $id]))->with('message', 'update berhasil!');
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }

    }
    public function editUser(Request $request, $id, $idUser)
    {
        $requestData = $request->all();
        $record = UsersModel::find($idUser);
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
                ->where('id', $idUser) // Replace 'id' with the column name you want to use for the update condition
                ->update([
                    'name' => $requestData['name'],
                    'school' => $requestData['school'],
                    'notelp' => $requestData['notelp'],
                    // Update other fields as needed
                ]);
            return redirect(route('superadmin.users', ['id' => $id]))->with('message', 'update berhasil!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['message' => 'update gagal']);
        }
    }
    public function editLowongan(Request $request, $id, $idLowongan)
    {
        $request->except(['_token']);
        $requestData = $request->all();


        try {
            //code...
            DB::table('lowongan')->where('id', '=', $idLowongan)->update([
                'title' => $requestData['title'],
                'description' => $requestData['description'],
                'status' => $requestData['status']
            ]);
            return redirect(route('superadmin.lowongan', ['id' => intval($id)]))->with(['message' => 'Lowongan sudah di update']);
        } catch (\Exception $e) {
            return dd($e);
            //throw $th;
        }

    }
    public function deleteLowongan(Request $request, $id, $idLowongan)
    {
        try {
            //code...
            DB::table('lowongan')
                ->where('id', '=', $idLowongan)
                ->delete();
            return redirect(route('superadmin.lowongan', ['id' => intval($id)]))->with(['message' => 'Lowongan sudah di update']);
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function deleteLamaran($id, $idLamaran)
    {
        try {
            //code...
            DB::table('lamaran')
                ->where('id', '=', $idLamaran)
                ->delete();
            return redirect(route('superadmin.lamaran', ['id' => intval($id)]))->with(['message' => 'Lamaran sudah di update']);

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function deletePemagangInaktif($id, $idPemagangInaktif)
    {
        try {
            //code...
            DB::table('pemagang_inaktif')
                ->where('id', '=', $idPemagangInaktif)
                ->delete();
            return redirect(route('superadmin.pemagangInAktif', ['id' => intval($id)]))->with(['message' => 'Lamaran sudah di update']);

        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function acceptPendingCompanies(Request $request, $id, $idCompany)
    {
        try {
            //code...
            CompaniesModel::where('id', '=', $idCompany)->update([
                'status' => 'accept'
            ]);
            return redirect(route('superadmin.pending.companies', ['id' => $id]));
        } catch (\Exception $e) {
            //throw $th;
            return dd($e);
        }
    }
    public function logout()
    {
        return redirect('/')->withCookie(Cookie::forget('userId'));
    }
    public function showHomeSuperAdmin(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->where('role', '=', 'superAdmin')->first();
        $userCount = UsersModel::where('role', '=', 'user')->count();
        $lowonganCount = LowonganModels::count();
        $lamaranCount = LamaranModels::count();
        $pemagangAktifCount = pemagang_aktif::count();
        $pemagangInAktifCount = pemagang_inaktif::count();
        $companiesCount = CompaniesModel::count();
        $pendingCount = CompaniesModel::where('status', '=', 'pending')->count();

        return view('/super-admin/homeLoginSuperAdmin', compact('user'), ['companiesCount' => $companiesCount, 'userCount' => $userCount, 'lowonganCount' => $lowonganCount, 'lamaranCount' => $lamaranCount, 'pemagangAktifCount' => $pemagangAktifCount, 'pemagangInAktifCount' => $pemagangInAktifCount, 'pendingCount' => $pendingCount]);
    }
    public function showAllUsers(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $users = UsersModel::where('role', '=', 'user')->get();
        return view('/super-admin/showAllUsers', ['data' => $users], compact('user'));
    }
    public function showAllCompanies(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $companies = CompaniesModel::all();
        return view('/super-admin/showAllCompanies', ['data' => $companies], compact('user'));
    }
    public function showAllLowongan(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $lowongan = LowonganModels::all();
        return view('/super-admin/showAllLowongan', ['data' => $lowongan], compact('user'));
    }
    public function showAllLamaran(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $lamaran = LamaranModels::all();
        return view('/super-admin/showAllLamaran', ['data' => $lamaran], compact('user'));
    }
    public function showAllPemagangAktif(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $aktif = pemagang_aktif::all();
        return view('/super-admin/showAllPemagangAktif', ['data' => $aktif], compact('user'));
    }
    public function showAllPemagangInAktif(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $inaktif = pemagang_inaktif::all();
        return view('/super-admin/showAllPemagangInAktif', ['data' => $inaktif], compact('user'));
    }
    public function showAllPendingCompanies(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $user = UsersModel::where('id', '=', $id)->first();
        $pending = CompaniesModel::where('status', '=', 'pending')->get();
        $pendingCount = CompaniesModel::where('status', '=', 'pending')->count();
        return view('/super-admin/showAllPendingCompanies', ['data' => $pending, 'pendingCount' => $pendingCount], compact('user'));
    }
    public function showEditUser(Request $request, $id, $idUser)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $admin = UsersModel::where('role', '=', 'superAdmin')->first();
        $user = UsersModel::where('role', '=', 'user')->first();
        return view('/super-admin/editUser', compact('user'), compact('admin'));
    }
    public function showEditCompany(Request $request, $id, $idCompany)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $admin = UsersModel::where('id', '=', $id)->first();
        $company = CompaniesModel::where('id', '=', $idCompany)->first();
        return view('/super-admin/editCompany', compact('company'), compact('admin'));
    }
    public function showEditLowongan(Request $request, $id, $idLowongan)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        }
        $admin = UsersModel::where('id', '=', $id)->first();
        $lowongan = LowonganModels::where('id', '=', $idLowongan)->first();
        return view('/super-admin/editLowongan', compact('lowongan'), compact('admin'));
    }
}