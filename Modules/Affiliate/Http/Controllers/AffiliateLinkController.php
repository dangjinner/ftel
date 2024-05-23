<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\AffiliateLink;

class AffiliateLinkController extends Controller
{
    public function generateAffiliateLink($code)
    {
        $affiliateLink = AffiliateLink::where('code', $code)->firstOrFail();
        return redirect()->to($affiliateLink->ctvUrl());
    }
}
