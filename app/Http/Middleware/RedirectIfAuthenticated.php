<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = ['admin', 'advertiser', 'media_owner'];

        // dd($request->path());
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && $request->url() == route('AdminLogin') && $guard == 'admin') {
                return redirect()->route('admin.index');
            }elseif (Auth::guard($guard)->check() && $request->url() == route('ADLogin') && $guard == 'advertiser') {
                return redirect()->route('advertiser.dashboard');
            }elseif (Auth::guard($guard)->check() && $request->url() == route('MOLogin') && $guard == 'media_owner') {
                return redirect()->route('MOScreens');
            }
        }
        return $next($request);
    }
}
