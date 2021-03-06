<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role === 'instructor'){
            return redirect('/instructor/dashboard');
        }

        if(auth()->user()->role === 'admin'){
            return redirect('dashboard');
        }

        if(auth()->user()->role === 'student'){
            return redirect('/student/dashboard');
        }

        return $next($request);
    }
}
