<?php

namespace Modules\Affiliate\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetAffiliateCodeCookie
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
        $setCookie = $request->get('set_cookie');
        $cookieTime = $request->get('cookie_time');

        if($request->has('affCode') && $setCookie == 'true') {
            $affCookie = cookie('aff_code', $request->get('affCode'), $cookieTime);
            return $next($request)->withCookie($affCookie);
        }

        return $next($request);
    }
}
