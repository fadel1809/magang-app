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
            'address' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!'
        ]);
        return $next($request);
    }
}