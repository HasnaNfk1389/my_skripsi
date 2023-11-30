<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session('loggedUserIsAdmin'));
        if (session('loggedUserRole') === 'admin') {
            return redirect('/welcome_admin');
        } else if (session('loggedUserRole') === 'teacher') {
            return redirect('/welcome_lecturer');
        } else if (session('loggedUserRole') === 'user') {
            return $next($request);
        }
    }
}
