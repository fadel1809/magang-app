<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginInputValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errorMessage = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'kolom email kosong!',
            'email.email' => 'email tidak valid!',
            'password.required' => 'kolom password kosong!',
            'password.min' => 'password minimal 8 karakter!',
        ]);
        return $next($request, $errorMessage);
    }
}