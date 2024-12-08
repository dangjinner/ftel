<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Entities\AffiliateCustomer;

class AffiliateAgencyController extends Controller
{
    public function registeredCustomers(Request $request)
    {
        $customers = Auth::user()->affiliateAccount->customers()->paginate(15);

        return view('public.affiliate.agency.registered_customers', compact('customers'));
    }
}
