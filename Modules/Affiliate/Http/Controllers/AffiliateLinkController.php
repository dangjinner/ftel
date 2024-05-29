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

        if (!$affiliateProduct) {
            return abort(404);
        }

        if ($affiliateProduct->type == AffiliateProduct::FOR_PRODUCT_AND_SERVICE) {
            $redirectUrl = '/';
        } elseif ($affiliateProduct->type == AffiliateProduct::FOR_URL) {
            $params = http_build_query([
                'affCode' => $code,
                'cookie_time' => $affiliateProduct->cookie_time,
                'set_cookie' => $affiliateProduct->is_set_cookie ? 'true' : 'false'
            ]);
            $redirectUrl = $affiliateProduct->page_url . '?' . $params;
        }

        $cookie = \cookie();

        if ($affiliateProduct->is_set_cookie) {
            $cookie = \cookie('aff_code', $affiliateLink->code, $affiliateProduct->cookie_time);
        }

        return redirect()->to($redirectUrl)->withCookie($cookie);
    }

    public function getSingleLink($code)
    {
        $link = AffiliateLink::where('code', $code)
            ->firstOrFail();
        $customers = $link->customers()->paginate(15);
        return view('public.affiliate.single_link', compact('link', 'customers'));
    }
}
