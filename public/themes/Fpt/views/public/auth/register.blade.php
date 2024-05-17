@extends('public.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Đăng ký</h2>
                @if(Session::has('message'))
                    <div class="alert alert-success mt-2 mb-2">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card mt-3 p-3">
                    <form method="POST" action="{{ route('auth.register.post') }}">
                        @csrf
                        <div class="form-row form-group">
                            <div class="col">
                                <label for="last_name">Họ, tên đệm<span class="text-danger">*</span></label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter last name">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="first_name">Tên<span class="text-danger">*</span></label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter first name">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại<span class="text-danger">*</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone number">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ email<span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu<span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Xác nhận mật khẩu<span class="text-danger">*</span></label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Password">
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>

                    <div id="emailHelp" class="form-text text-center mt-3 mb-2 text-dark">Đã có tài khoản?
                        <a href="{{ route('auth.login.get') }}" class="text-primary fw-bold"> Đăng nhập ngay</a>
                    </div>
                    <b class="text-dark text-center mb-2 bold">Hoặc</b>
                    <a href="{{ url('auth/google') . '?callbackUrl=' . request()->getRequestUri() }}">
                        <div class="google-btn d-flex align-items-center">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="{{ v(Theme::url('assets/images/icon/google.png')) }}"/>
                            </div>
                            <p class="google-btn-text"><b>Đăng ký bằng tài khoản Google</b></p>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection
