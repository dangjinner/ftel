@extends('public.layout')
@section('content')
    <div class="container">
      <div class="card mt-5 p-3">
          <div class="row">
              <div class="col-3">
                  <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" href="#">Tài khoản</a>
                      <a class="nav-link " href="#">Affiliate</a>
                      <a class="nav-link " href="{{ route('auth.logout') }}">Đăng xuất</a>
                  </div>
              </div>
              <div class="col-9">
                  <div class="pl-2 pr-2">
                      @yield('sub_content')
                  </div>
              </div>
          </div>
      </div>
    </div>
@endsection
