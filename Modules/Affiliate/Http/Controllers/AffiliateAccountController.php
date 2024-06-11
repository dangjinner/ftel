<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Http\Requests\Client\RegisterAffiliateAccountRequest;

class AffiliateAccountController extends Controller
{
    public function getRegister()
    {
        $user = auth()->user();
        return view('public.affiliate.register', compact('user'));
    }

    public function postRegister(RegisterAffiliateAccountRequest $request)
    {
        $data = $request->only(
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'address',
            'bank_account_name',
            'bank_account_number',
            'bank_name',
            'bank_branch',
        );
        $data['user_id'] = auth()->id();
        $data['status'] = AffiliateAccount::PENDING;
        AffiliateAccount::create($data);
        return back()->with([
            'message' => 'Đăng ký thông tin thành công, vui lòng chờ quản trị viên duyệt tài khoản!'
        ]);
    }

    public function pending()
    {
        return view('public.affiliate.pending');
    }
}
