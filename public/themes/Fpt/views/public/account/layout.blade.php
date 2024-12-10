@extends('public.layout')

@push('styles')
    <style>
        .commission-info {
            background-color: rgba(188, 228, 245, 0.37);
        }

        #accountMobileMenu {
            display: none;
        }

        @media (max-width: 768px) {
            #accountMenu {
                display: none;
            }

            #accountMobileMenu {
                display: block;
            }
        }

        @media (min-width: 576px) {

        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="card commission-info mt-3 mb-4 p-3">
            <div class="d-flex align-items-center" style="gap: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-cash"
                     viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path
                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                </svg>
                <div style="font-size: 16px">Số tiền hoa hồng hiện tại :</div>
                <strong class="text-danger"
                        style="font-size: 25px">{{ auth()->user()->total_commission->format() }}</strong>
            </div>
        </div>
        <div class="card p-3">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div id="accountMenu" class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link @if(Request::is('tai-khoan/*')) active @endif"
                           href="{{ route('account.info') }}">Tài khoản</a>
                        <a class="nav-link d-flex justify-content-between align-items-center @if(Request::is('affiliate/*')) active @endif"
                           data-toggle="collapse" href="#accountCollapseMenu" role="button" aria-expanded="false"
                           aria-controls="accountCollapseMenu"
                        >
                            Affiliate
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                                 viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>

                        </a>
                        <div class="collapse " id="accountCollapseMenu">
                            <div class="list-group">
                                <a class="list-group-item" href="{{ route('affiliate.products') }}">Sản phẩm</a>
                                @if(auth()->user()->affiliateAccount->isAgency())
                                    <a class="list-group-item"
                                       href="{{ route('affiliate.agency.registered_customers') }}">Khách hàng</a>
                                    <a class="list-group-item"
                                       href="{{ route('affiliate.agency.account_info') }}">Tài khoản đại lý</a>
                                @endif
                            </div>
                        </div>
                        <a class="nav-link " href="{{ route('auth.logout') }}">Đăng xuất</a>
                    </div>
                    <div id="accountMobileMenu" class="dropdown show mb-2">
                        <a class="btn btn-sm btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>

                        <div class="dropdown-menu nav-pills" aria-labelledby="dropdownMenuLink">
                            <a class="nav-link @if(Request::is('tai-khoan/*')) active @endif"
                               href="{{ route('account.info') }}">Tài khoản</a>
                            <a class="nav-link @if(Request::is('affiliate/*')) active @endif"
                            >Affiliate</a>
                            <div class="list-group">
                                <a class="list-group-item" href="{{ route('affiliate.products') }}">Sản phẩm</a>
                                @if(auth()->user()->affiliateAccount->isAgency())
                                    <a class="list-group-item"
                                       href="{{ route('affiliate.agency.registered_customers') }}">Khách hàng</a>
                                    <a class="list-group-item"
                                       href="{{ route('affiliate.agency.account_info') }}">Tài khoản đại lý</a>
                                @endif
                            </div>
                            <a class="nav-link " href="{{ route('auth.logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="pl-2 pr-2">
                        @yield('sub_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @stack('sub_scripts')
@endsection
