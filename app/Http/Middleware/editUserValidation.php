<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class editUserValidation
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
            'school' => 'required',
            'notelp' => 'required',

        ], [
            'name.required' => 'kolom nama kosong',
            'school.required' => 'kolom school kosong',
            'notelp.required' => 'kolom nomor telpon kosong',

        ]);
        $request->merge(['errorMessage' => $errorMessage]);
        return $next($request);
    }
}