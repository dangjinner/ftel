<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Entities\AffiliateCustomer;
use Modules\Affiliate\Http\Requests\Client\UpdateAgencyAccountInfoRequest;

class AffiliateAgencyController extends Controller
{
    public function registeredCustomers(Request $request)
    {
        $customers = Auth::user()->affiliateAccount->customers()->paginate(15);

        return view('public.affiliate.agency.registered_customers', compact('customers'));
    }

    public function accountInfo(Request $request)
    {
        $affiliateAccount = Auth::user()->affiliateAccount;
        return view('public.affiliate.agency.account_info', compact('affiliateAccount'));
    }

    public function updateAccountInfo(UpdateAgencyAccountInfoRequest $request)
    {
        $affiliateAccount = Auth::user()->affiliateAccount;

        if ($affiliateAccount) {
            $affiliateAccount->update($request->only('first_name', 'last_name', 'phone_number'));
        }

        return back()->with([
            'message' => 'Update Agency Info Successfully',
        ]);
    }
}
