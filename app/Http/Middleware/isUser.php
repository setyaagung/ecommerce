<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id == 2) {
            if (Auth::check() && Auth::user()->is_active) {
                $banned = Auth::user()->is_active == 1;
                Auth::logout();
                if ($banned) {
                    $message = 'Akun anda telah dinonaktifkan. Silahkan hubungi Administrator';
                }
                return redirect()->route('login')->withErrors(['email' => $message]);
            }
            if (Auth::check()) {
                $expiresAt = Carbon::now()->addMinutes(1);
                Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
            }
            return $next($request);
        }
    }
}
