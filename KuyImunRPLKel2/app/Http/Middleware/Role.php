<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Library\ApiHelpers;
// use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request, Closure $next, ... $roles)
    {
        $user = Auth::user();

        // if(auth('sanctum')->user()->isAdmin())
        //     return $next($request);

        foreach($roles as $role) {
            if($user->hasRole($role))
                return $next($request);
        }
        
        // return redirect()->route('login');
        return response('Unauthorized.', 401);
    }
}
