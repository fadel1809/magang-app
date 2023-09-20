<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function securePage(Request $request, $id)
    {
        $idCookie = intval($request->cookie('userId'));
        $idParam = intval($id);
        if ($idParam !== $idCookie) {
            return redirect('/')->withErrors(['message' => 'autentikasi gagal']);
        } else {
            return true;
        }
    }
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}