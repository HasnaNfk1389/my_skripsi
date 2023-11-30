<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
            return $next($request);
        } else if (session('loggedUserRole') === 'teacher') {
            return redirect('/welcome_lecturer');
        } else if (session('loggedUserRole') === 'user') {
            return redirect('/welcome');
        }
    }
}
