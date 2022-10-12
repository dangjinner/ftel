@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online FPT" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.fptTelevision') }}" class="active">Hỗ trợ thông tin</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.installationInstructions') }}">Hỗ trợ kỹ thuật</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.contact') }}">
                        Liên Hệ</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="#">
                        Phản hồi khách hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>
                            <h1><a href="{{ route('home') }}">Trang chủ</a></h1>
                        </li>
                        <li>Hỗ trợ</li>
                        <li>Hướng dẫn sử dụng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="productservice productservice--1">
    <div class="container">
        <div class="col-lg-12 col-12">
            <div class="testimonial-carousel--1 slick-custom slick-custom-default nav-top">
                <div class="single_testimonial text-center active">
                    <a class="productservice__img" href="{{ route('pages.support.fptTelevision') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-1.png')) }}"
                            alt="Hướng dẫn sử dụng FPT" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.fptTelevision') }}" alt="Hướng dẫn sử dụng">Hướng dẫn sử dụng</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.procedureGuide') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-2.png')) }}"
                            alt="Hướng dẫn thủ tục FPT" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.procedureGuide') }}" alt="Hướng dẫn thủ tục">Hướng dẫn thủ tục</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.privacyPolicy') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-4.png')) }}"
                            alt="Điều khoản bảo mật" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.privacyPolicy') }}" alt="Điều khoản bảo mật">Điều khoản bảo mật</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.faq') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-5.png')) }}"
                            alt="Câu hỏi thường gặp" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.faq') }}" alt="Điều khoản bảo mật">Câu hỏi thường gặp</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-category-area productservice">
    <div class="container">
        <ul class="product-thing-tab category-tabs slick-custom slick-custom-default">
            <li class="nav-item">
                <a class="nav-link" id="four-tab" href="{{ route('pages.support.fptTelevision') }}">
                    <span><img src="{{ v(theme::url('assets/images/icon/i-box fpt.png')) }}" alt="Truyền hình FPT"
                            class="img-fluid"></span>
                    <span>Truyền hình FPT</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="five-tab" href="{{ route('pages.support.camera') }}">
                    <span><img src="{{ v(theme::url('assets/images/icon/i-camfc fpt.png')) }}" alt="Camera FPT"
                            class="img-fluid"></span>
                    <span>Camera</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="six-tab" href="{{route('pages.support.fptPlaybox')}}">
                    <span><img src="{{ v(theme::url('assets/images/icon/i-hdbox fpt.png')) }}" alt="fPT Play Box"
                            class="img-fluid"></span>
                    <span>FPT Play Box</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="eight-tab" href="{{ route('pages.support.hiFpt') }}">
                    <span><img src="{{ v(theme::url('assets/images/icon/i-fpt-play fpt.png')) }}" alt="Hi FPT"
                            class="img-fluid"></span>
                    <span>Hi FPT</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="product-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="four">
                        <!-- Single-Product-Start -->
                        <form action="#" class="cart-form">
                            <!-- Cart Title Start -->
                            <!-- Cart Title End -->
                            <!-- Cart Table Area Start -->
                            <div class="table-desc">
                                <div class="cart-page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Tên tài liệu</th>
                                                <th class="product-price">Video</th>
                                                <th class="product-quantity">Tài liệu</th>
                                                <th class="product-remove">Ngày đăng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $item)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </td>
                                                <td class="product-price">
                                                    @if ($item->video)
                                                    <a href="{{ $item->video }}" target="_black">
                                                        <img
                                                            src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" />
                                                    </a>
                                                    @endif
                                                </td>
                                                <td class="product-total">
                                                    <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                                        <img
                                                            src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" />
                                                    </a>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                                        {{ $item->date_support }}
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Cart Table Area End -->
                            <!-- Coupon Area Start -->
                            <!-- Coupon Area End -->
                        </form>
                        <!-- Single-Product-End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
