<?php

namespace Themes\Fpt\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\User\Entities\User;
use Themes\Fpt\Emails\VerifyAccountMail;
use Themes\Fpt\Http\Requests\LoginRequest;
use Themes\Fpt\Http\Requests\RegisterAccountRequest;
use Themes\Fpt\Http\Requests\VerifyActivationCodeRequest;
use Themes\Fpt\Http\Requests\VerifyEmailRequest;

class AuthController extends Controller
{
    public function getLogin()
    {
        if(\auth()->check()) {
            return redirect()->route('account.info');
        }
        return view('public.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = User::findByEmail($request->email);
                $request->session()->regenerate();

                return redirect()->route('account.info');
            }
        } catch (NotActivatedException $e) {

            return redirect()->route('auth.verify.get');
        } catch (\Exception $e) {

        }

        return back()->withErrors([
            'error' => 'Tài khoản  hoặc mật khẩu không chính xác!'
        ]);
    }

    public function getRegister()
    {
        if(\auth()->check()) {
            return redirect()->route('account.info');
        }

        return view('public.auth.register');
    }

    public function postRegister(RegisterAccountRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone
        ]);

        $activation = Activation::create($user);

        return back()->with(['message' => 'Đăng ký thành công!']);
    }

    public function getVerifyAccount()
    {
        if(\auth()->check()) {
            return redirect()->route('account.info');
        }

        return view('public.auth.verify_email');
    }

    public function postVerifyAccount(VerifyEmailRequest $request)
    {
        if(\auth()->check()) {
            return redirect()->route('account.info');
        }

        $user = User::findByEmail($request->email);
        $activation = Activation::where('user_id', $user->id)->first();
        if(!$activation) {
            $activation = Activation::create($user);
        }
        Mail::to($request->email)->send(new VerifyAccountMail([
            'verify_link' => route('auth.verify.link', ['activationCode' => $activation->code, 'email' => $user->email])
        ]));
        return back()->with([
            'message' => 'Vui lòng kiểm tra email để hoàn tất xác minh tài khoản!'
        ]);
    }

    public function completeVerifyAccount(VerifyActivationCodeRequest $request)
    {
        if(\auth()->check()) {
            return redirect()->route('account.info');
        }

        $user = User::findByEmail($request->email);
        $check = Activation::complete($user, $request->activationCode);

        if($check) {
            Sentinel::login($user);

            return view('public.auth.complete_verify', [
                'message' => 'Xác thực tài khoản thành công'
            ]);
        }

        return view('public.auth.complete_verify', [
            'error' => 'Xác thực tài khoản thất bại, vui lòng đăng nhập và xác minh lại!'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
