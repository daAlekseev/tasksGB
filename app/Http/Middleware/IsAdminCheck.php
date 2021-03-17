<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminCheck
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
        if (!(Auth::user())->isAdmin) {
            return redirect()
                ->back()
                ->with('errorMessage', "Для совершения данного действия необходимо обладать правами администратора!");
        }
        return $next($request);
    }
}
