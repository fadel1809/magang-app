<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurePageValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $cookieValue = $request->cookie('userId');
        if (!$cookieValue) {
            return redirect('/login')->withErrors(['message' => 'Kamu belum Login!!!']);
        } else {
            return $next($request);
        }
    }
}