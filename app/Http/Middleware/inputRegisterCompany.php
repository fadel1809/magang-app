<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class inputRegisterCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errorMessage = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'notelp' => 'required',
            'location' => 'required',
            'companyName' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!',
            'companyName.required' => 'Nama perusahaan harus diisi!',
            'email.required' => 'email harus diisi!',
            'email.email' => 'format email tidak valid',
            'password.required' => 'password harus diisi',
            'password.min' => 'password minimal 8',
            'notelp.required' => 'no telpon harus diisi!',
            'location.required' => 'alamat harus diisi!'
        ]);
        $request->merge(['errorMessage' => $errorMessage]);
        return $next($request);
    }
}