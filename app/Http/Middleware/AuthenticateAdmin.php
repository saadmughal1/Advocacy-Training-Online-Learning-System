<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('admin')->check()) {
            if ($request->is('admin/login')) {
                return redirect()->route('admin.home');
            }
        } else {
            if (!$request->is('admin/login')) {
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}
