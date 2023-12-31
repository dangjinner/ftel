<?php

namespace FleetCart\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class VerifyAdministrator
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
        if(str_contains($request->getPathInfo(), 'admin') && $request->user() && !($request->user()->isAdmin() || $request->user()->isEditor())) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
