<?php

namespace Themes\Fpt\Http\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function getAccountInfo()
    {
        return view('public.account.info');
    }
}
