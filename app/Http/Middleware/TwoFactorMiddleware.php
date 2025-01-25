<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->two_factor_code) {
            if (now()->greaterThan(Auth::user()->two_factor_expires_at)) {
                User::find(Auth::id())->clearTwoFactorCode();
                Auth::logout();
                return redirect('/login')->with('error', 'Your two-factor code has expired. Please login again.');
            }

            if (!$request->is('2fa*')) {
                return redirect()->route('2fa.index');
            }
        }

        return $next($request);
    }
}
