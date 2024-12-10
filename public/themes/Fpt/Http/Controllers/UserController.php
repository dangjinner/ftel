<?php

namespace Themes\Fpt\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Themes\Fpt\Http\Requests\Account\UpdateAccountInfoRequest;

class UserController extends Controller
{
    public function getAccountInfo()
    {
        $user = Auth::user();
        return view('public.account.info', compact('user'));
    }

    public function updateAccountInfo(UpdateAccountInfoRequest $request)
    {
        $user = Auth::user();
        $user->update($request->only(['first_name', 'last_name', 'phone_number']));

        return back()->with([
            'message' => 'Your account information was successfully updated.',
        ]);
    }
}
