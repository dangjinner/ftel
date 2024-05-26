<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Modules\Affiliate\Entities\AffiliateLink;
use Modules\Affiliate\Entities\AffiliateProduct;

class AffiliateLinkController extends Controller
{
    public function generateAffiliateLink($code)
    {
        $affiliateLink = AffiliateLink::where('code', $code)
            ->with(['product'])
            ->firstOrFail();
        $affiliateProduct = $affiliateLink->product;
        $redirectUrl = '/';

        if(!$affiliateProduct) {
            return abort(404);
        }

        if($affiliateProduct->type == AffiliateProduct::FOR_PRODUCT_AND_SERVICE) {
            $redirectUrl = $affiliateLink->ctvUrl();
        } elseif($affiliateProduct->type == AffiliateProduct::FOR_URL) {
            $params = http_build_query([
                'affCode' => $code
            ]);
            $redirectUrl = $affiliateProduct->page_url . '?' . $params;
        }

        $cookie = \cookie();

        if($affiliateProduct->is_set_cookie) {
            $cookieMinutes = 60*24*7;
            if($affiliateProduct->cookie_duration > 0) {
                $cookieMinutes = 60 * 24 * $affiliateProduct->cookie_duration;
            }
            $cookie = \cookie('aff_code', $affiliateLink->code, $cookieMinutes);
        }

        return redirect()->to($redirectUrl)->withCookie($cookie);
    }

}
