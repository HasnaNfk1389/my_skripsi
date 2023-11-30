<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('loggedUserRole') === 'admin') {
            return redirect('/welcome_admin');
        } else if (session('loggedUserRole') === 'teacher') {
            return $next($request);
        } else if (session('loggedUserRole') === 'user') {
            return redirect('/welcome');
        }
    }
}
