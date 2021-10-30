<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Privilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $privilege)
    {
        foreach($privilege as $level) {
            if (Auth::user()->level == $level) {
                return $next($request);
            }
        }

        return redirect()->back()->with('illegal', 'Illegal actions found! Please do not try to access unaccessible information not by your privilege.');
    }
}
