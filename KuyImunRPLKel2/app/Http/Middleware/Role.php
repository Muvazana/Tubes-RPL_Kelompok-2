<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Library\ApiHelpers;
use Illuminate\Contracts\Auth\Factory as Auth;

class Role
{
    use ApiHelpers;

    public function handle($request, Closure $next, ... $roles)
    {
        $user = auth('sanctum')->user();

        // if(auth('sanctum')->user()->isAdmin())
        //     return $next($request);

        foreach($roles as $role) {
            if($user->hasRole($role))
                return $next($request);
        }
        
        return route('login');
    }
}
