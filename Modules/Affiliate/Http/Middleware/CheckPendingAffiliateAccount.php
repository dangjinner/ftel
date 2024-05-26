<?php

namespace Modules\Affiliate\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Affiliate\Entities\AffiliateAccount;

class CheckPendingAffiliateAccount
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

        if(!$affAccount) {
            return $next($request);
        }

        if($affAccount && $affAccount->status == AffiliateAccount::PENDING) {
            return redirect()->route('affiliate.register.pending');
        }

        return redirect()->route('affiliate.products');
    }
}
