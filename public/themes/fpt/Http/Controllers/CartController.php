<?php

namespace Themes\Fpt\Http\Controllers;
use Modules\Cart\Http\Middleware\CheckCartStock;
use Modules\Cart\Http\Middleware\RedirectIfCartIsEmpty;
use Illuminate\Routing\Controller;
use Modules\Cart\Facades\Cart;

class CartController extends Controller
{

    public function __construct() {
        $this->middleware([
            RedirectIfCartIsEmpty::class,
            CheckCartStock::class,
        ])->except('index');
    }


    public function index()
    {
        $cartItems = Cart::instance();
        // dd($cartItems->coupon());
        return view('public.cart.index', compact('cartItems'));
    }

    public function billing_information()
    {
        return view('public.cart.billing_information');
    }
}

