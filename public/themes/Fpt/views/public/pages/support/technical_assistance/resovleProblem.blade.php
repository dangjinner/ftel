@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online FPT" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ thông tin</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.installationInstructions') }}" class="active">Hỗ trợ kỹ thuật</a>
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
                        <li>
                            <h1>
                                <a href="{{ route('pages.support.resovleProblem') }}">Xử lý sự cố</a>
                            </h1>
                        </li>
                        @if ($slug)
                        <li>{{ $group->name }}</li>
                        @endif
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
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.installationInstructions') }}">
                        <img src="{{ v(theme::url('assets/images/setting.png')) }}" alt="Hướng dẫn cài đặt"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.installationInstructions') }}" alt="Hướng dẫn cài đặt">
                            Hướng dẫn cài đặt
                        </a>
                    </p>
                </div>
                <div class="single_testimonial text-center active">
                    <a class="productservice__img" href="{{ route('pages.support.resovleProblem') }}">
                        <img src="{{ v(theme::url('assets/images/troubleshooting.png')) }}" alt="Xử lý sự cố"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.resovleProblem') }}" alt="Xử lý sự cố">
                            Xử lý sự cố
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-category-area productservice">
    <div class="container">
        <ul class="product-thing-tab category-tabs slick-custom slick-custom-default">
            @foreach ($groups as $item)
            <li class="nav-item">
                <a class="nav-link {{ $item->slug == $slug ? 'active' : '' }} {{ ($slug == null && $loop->first) ? 'active' : '' }}"
                    href="{{ route('pages.support.resovleProblem', ['slug' => $item->slug]) }}">
                    <span><img src="{{ $item->logo->path }}" alt="{{ $item->name }}" class="img-fluid"></span>
                    <span>{{ $item->name }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="product-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    @if ($group->intro)
                    {!! $group->intro !!}
                    @endif
                    <div class="tab-pane fade show active">
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
