<?php

namespace App\Http\Middleware;

use Closure;

class UrlBasedAuthentication
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
        $role = $request->user()->roles()->first()->name;
        if($role === 'SUPER_ADMIN' && ($request->is('super-admin/*')))
            return $next($request);
        else if($role === 'ADMIN' && ($request->is('admin/*')))
            return $next($request);
        else if($role === 'MANAGER' && ($request->is('manager/*')))
            return $next($request);       
        else if($role === 'VIEWER' && ($request->is('viewer/*')))
            return $next($request);    
        else
            return redirect('/error/401');
    }
}
