<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterInputValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errorMessage = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'school' => 'required',
            'location' => 'required',
            'notelp' => 'required'
        ], [
            'name.required' => 'kolom nama kosong!',
            'email.required' => 'kolom email kosong!',
            'email.email' => 'email tidak valid!',
            'password.required' => 'kolom password kosong!',
            'password.min' => 'password minimal 8 karakter!',
            'school.required' => 'kolom sekolah atau univarsitas kosong!',
            'location.required' => 'kolom lokasi kosong!',
            'notelp' => 'kolom nomor telpon kosong!'
        ]);
        $request->merge(['errorMessage' => $errorMessage]);
        return $next($request);
    }
}