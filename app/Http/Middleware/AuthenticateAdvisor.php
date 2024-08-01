<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdvisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('advisor')->check()) {
            if ($request->is('advisor/login')) {
                return redirect()->route('advisor.home');
            }
        } else {
            if (!$request->is('advisor/login')) {
                return redirect()->route('advisor.login');
            }
        }

        return $next($request);
    }
}
