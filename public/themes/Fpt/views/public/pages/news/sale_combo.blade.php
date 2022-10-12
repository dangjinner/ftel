@extends('public.layout')

@section('content')
<div class="slider__banner mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 slider__inner">
                @include('public.layouts.slider')
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
                        <li>
                            <h1><a href="{{ route('pages.sale') }}">Khuyến mãi</a></h1>
                        </li>
                        <li>Combo Internet & Truyền hình</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="productservice shopserive productservice--1">
    <div class="container">
        <div class="col-lg-12 col-12">
            <div class="testimonial-carousel--1 slick-custom slick-custom-default nav-top">
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.saleInternet') }}">
                        <img src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}" alt="Internet FPT"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.saleInternet') }}" alt="INTERNET FPT">INTERNET FPT</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.saleNetTv') }}">
                        <img src="{{ v(theme::url('assets/images/icon/tv fpt.png')) }}" alt="" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.saleNetTv') }}" alt="TRUYỀN HÌNH FPT"> TRUYỀN HÌNH FPT </a>
                    </p>
                </div>
                <div class="single_testimonial text-center active">
                    <a class="productservice__img" href="{{ route('pages.comboInternet') }}">
                        <img src="{{ v(theme::url('assets/images/icon/combo net tv fpt.png')) }}" alt=""
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.comboInternet') }}" alt="Net + Truyền hình FPT"> COMBO INTERNET +
                            TRUYỀN HÌNH</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.cameraFpt') }}">
                        <img src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}" alt="" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.cameraFpt') }}" alt="FPT CAMERA"> FPT CAMERA </a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{  route('pages.playBoxx')  }}">
                        <img src="{{ v(theme::url('assets/images/icon/fpt play box.png')) }}" alt="" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{  route('pages.playBoxx')  }}" alt="FPT PLAY BOX">FPT PLAY BOX</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{  route('pages.iHome')  }}">
                        <img src="{{ v(theme::url('assets/images/icon/home fpt.png')) }}" alt="FPT iHOME"
                            class="img-fluid" alt="" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{  route('pages.iHome')  }}" alt="FPT PLAY BOX">FPT iHOME</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news news--1">
    <div class="container">
        <div class="row mt-20 mb-20">
            <div class="col-lg-12">
                <div class="block-title block__orange">
                    <h2>
                        <span class="block__image">
                            <img src="{{ v(theme::url('assets/images/latest-news.png')) }}" alt="Tin mới nhất FPT">
                        </span>
                        TIN MỚI NHẤT
                    </h2>
                </div>
            </div>
            @php
            $patternFirstBox = '/\[(box).(.*?)\]/';
            $patternEndBox = '/\[\/box\]/';
            @endphp
            @if (count($posts) > 0)
            @foreach ($posts as $item)
            @if ($loop->first)
            <div class="col-lg-8 news__first col-md-6 col-sm-6">
                <!-- Single Blog Start -->
                <div class="single-blog">
                    <div class="blog-image mb-10">
                        <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}"><img
                                src="{{ $item->logo->path }}" alt="{{ $item->name }}" class="img-fluid"></a>
                    </div>
                </div>
                <!-- Single Blog End -->
            </div>
            <div class="col-lg-4 news__first col-md-6 col-sm-6">
                <!-- Single Blog Start -->
                <div class="single-blog">
                    <div class="blog-content">
                        <h5 class="news__title mb-10">
                            <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <ul class="meta">
                            <li><a href="#"><span
                                        class="news__category">{{ count($item->groups) > 0 ? $item->groups[0]->name : '' }}</span>,{{$item->date}}</a>
                            </li>
                        </ul>
                        <div class="desc">
                            <p>
                                {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '', $item->content)), 25) !!}
                            </p>
                        </div>
                        <div><a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}" class="news__more">
                                Tìm hiểu</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
            </div>
            @else
            <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                <!-- Single Blog Start -->
                <div class="single-blog">
                    <div class="blog-image mb-10">
                        <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}"><img
                                src="{{ $item->logo->path }}" alt="{{ $item->name }}" class="img-fluid"></a>
                    </div>
                    <div class="blog-content">
                        <h5 class="news__title mb-10">
                            <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <ul class="meta">
                            <li><a href="#"><span
                                        class="news__category">{{ count($item->groups) > 0 ? $item->groups[0]->name : '' }}</span>,{{$item->date}}</a>
                            </li>
                        </ul>
                        <div class="desc">
                            <p>
                                {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '', $item->content)), 25) !!}
                            </p>
                        </div>
                        <div><a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}" class="news__more">
                                Tìm hiểu</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
            </div>
            @endif
            @endforeach
            @else
            <div class="alert alert-danger col-lg-12" role="alert">
                Chuyên mục chưa có bài viết nào?
            </div>
            @endif
        </div>
        <div class="toolbar-shop toolbar-bottom">
            <div class="pagination-control">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
