<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Contracts\Authentication;
use Modules\User\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthSocialController extends Controller
{
    protected $auth;
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function redirectToFacebook(Request  $request)
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()

    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->to('/');
            }else{
                $newUser = $this->auth->registerAndActivate([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make(Str::random(20))
                ]);
                Auth::login($newUser);
                return redirect()->to('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirectToGoogle(Request $request)
    {
        Session::put('callbackUrl', $request->callbackUrl);
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        $callbackUrl = Session::get('url.intended') ?? Session::get('callbackUrl');

        if(auth()->check()) {
            Auth::logout();
        }

        DB::beginTransaction();
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser, true);
            }else{
                $newUser = $this->auth->registerAndActivate([
                    'first_name' => $user->user['family_name'],
                    'last_name' => $user->user['given_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make(Str::random(20)),
                    'avatar' => $user->avatar
                ]);
                Auth::login($newUser);
            }
            DB::commit();
            return redirect()->to($callbackUrl ?? '/');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->to($callbackUrl ?? '/');
        }
    }
}
