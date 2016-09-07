<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        } else {
            if (!Auth::user()->type == 'admin') {
                return redirect('login');
            }
        }
        return $next($request);
    }
}
