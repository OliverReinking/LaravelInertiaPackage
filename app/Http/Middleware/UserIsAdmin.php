<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin
{
    public function handle($request, Closure $next)
    {
        //dd("UserIsAdmin handle: ", $request, Auth::user());
        if (!Auth::user()->is_admin) {
            Auth::guard('web')->logout();
            return redirect(route('login'));
        }
        //
        return $next($request);
    }
}
