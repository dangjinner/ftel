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
                        <li>Câu hỏi thường gặp</li>
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
                    <a class="productservice__img" href="{{ route('pages.support.fptTelevision') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-1.png')) }}"
                            alt="Hướng dẫn sử dụng FPT" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.fptTelevision') }}" alt="Hướng dẫn sử dụng">Hướng dẫn sử
                            dụng</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{route('pages.support.procedureGuide')}}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-2.png')) }}"
                            alt="Hướng dẫn thủ tục FPT" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{route('pages.support.procedureGuide')}}" alt="Hướng dẫn thủ tục">Hướng dẫn thủ
                            tục</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.privacyPolicy') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-4.png')) }}"
                            alt="Điều khoản bảo mật" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.privacyPolicy') }}" alt="Điều khoản bảo mật">Điều khoản bảo
                            mật</a>
                    </p>
                </div>
                <div class="single_testimonial text-center active">
                    <a class="productservice__img" href="{{route('pages.support.faq')}}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-5.png')) }}"
                            alt="Câu hỏi thường gặp" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{route('pages.support.faq')}}" alt="Điều khoản bảo mật">Câu hỏi thường gặp</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-category-area mt-30">
    <div class="container">
        <div class="product-category-area productservice">
            <div class="container">
                <ul class="product-thing-tab category-tabs slick-custom slick-custom-default">
                    @foreach ($groups as $item)
                        <li class="nav-item {{ $item->slug == $slug ? 'active' : '' }} {{ ($slug == null && $loop->first) ? 'active' : '' }}">
                            <a class="nav-link {{ $item->slug == $slug ? 'active' : '' }} {{ ($slug == null && $loop->first) ? 'active' : '' }}"href="{{ route('pages.support.faq', ['slug' => $item->slug]) }}">
                                <span>
                                    <img src="{{ $item->logo->path }}" alt="{{ $item->name }}"
                                        class="img-fluid"></span>
                                <span>{{ $item->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="faq-area mt-45">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="faq-content">
                            <form method="GET" action="{{ url()->current() }}" id="faq-form">
                                <div class="input-group display-block">
                                    <input id="faq-search-keywords" name="s" maxlength="50" class=" form-control" type="text" value="{{ request('s') ?? '' }}">
                                    <button type="submit" class="btn-send input-group-addon">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--FAQ Accordin Start-->
                        <div class="faq-accordion">
                            <div id="accordion">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($posts as $item)
                                    <div class="card">
                                        <div class="card-header" id="heading{{$i}}">
                                            <h5 class="mb-0">
                                                <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false"
                                                    aria-controls="collapse{{$i}}">
                                                    {{ $i .'. '. $item->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="content-answer">
                                                    {!! $item->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
