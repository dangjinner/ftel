@extends('public.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Đăng nhập</h2>
                @error('error')
                <div class="alert alert-danger mt-2 mb-2">
                    {{ $message }}
                </div>
                @enderror
                <div class="card mt-3 p-3">
                    <form method="POST" action="{{ route('auth.login.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>

                    <div id="emailHelp" class="form-text text-center mt-3 mb-2 text-dark">Chưa có tài khoản?
                        <a href="{{ route('auth.register.get') }}" class="text-primary fw-bold"> Đăng ký ngay</a>
                    </div>
                    <b class="text-dark text-center mb-2 bold">Hoặc</b>
                    <a href="{{ url('auth/google') . '?callbackUrl=' . request()->getRequestUri() }}">
                        <div class="google-btn d-flex align-items-center">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="{{ v(Theme::url('assets/images/icon/google.png')) }}"/>
                            </div>
                            <p class="google-btn-text"><b>Đăng nhập bằng tài khoản Google</b></p>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection
