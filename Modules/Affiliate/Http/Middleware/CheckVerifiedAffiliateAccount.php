<?php

namespace Modules\Affiliate\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Affiliate\Entities\AffiliateAccount;

class CheckVerifiedAffiliateAccount
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
        $user = auth()->user();
        $affAccount = $user->affiliateAccount()->first();

        if($affAccount && $affAccount->status == AffiliateAccount::ACTIVE) {
            return $next($request);
        }

        return redirect()->route('affiliate.register.get');
    }
}
