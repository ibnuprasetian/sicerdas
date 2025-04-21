<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $autAuthRole = Auth::user()->role;

        switch($role){
            case 'teacher';
                if($autAuthRole == 1){
                return $next($request);
            }
            break;
            case 'student';
                if($autAuthRole == 2){
                return $next($request);
            }
        }

        switch($autAuthRole){
            case 1:
                return redirect()->route('teacher.dashboard');
            case 2:
                return redirect()->route('student.dashboard');
        }

        return redirect()->route('login');
    }
}
