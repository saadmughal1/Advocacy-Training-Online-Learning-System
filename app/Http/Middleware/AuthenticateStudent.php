<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('student')->check()) {
            if ($request->is('student/login')) {
                return redirect()->route('student.home');
            }
        } else {
            if (!$request->is('student/login')) {
                return redirect()->route('student.login');
            }
        }

        return $next($request);
    }
}
