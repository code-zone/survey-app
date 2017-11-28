<?php

namespace App\Http\Middleware;

use Closure;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->status) {
            return $next($request);
        }
        auth()->logout();
        $request->session()->put('blocked', 'Your user account hass been blocked contact the system Admin');

        return redirect()->route('login');
    }
}
