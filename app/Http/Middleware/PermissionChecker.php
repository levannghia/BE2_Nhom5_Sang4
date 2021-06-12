<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $mangRole = explode('|',$roles);
        if(in_array(Auth::user()->getRole(),$mangRole)){
            return $next($request);
        }
        return redirect()->route('404');
    }
    
}
