<?php

namespace Themes\Fpt\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAccountInfo()
    {
        $user = Auth::user();
        return view('public.account.info', compact('user'));
    }
}
