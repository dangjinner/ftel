@extends('public.layout')

@section('content')

<!--=====================
   Breadcrumb Aera End
   =========================-->
<div class="slider__banner mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 slider__inner">
                <div class="slider_area slider-one">
                    <!-- Single Slider Start -->
                    <!-- Single Slider End -->
                    <!-- Single Slider Start -->
                    <div class="single_slider">
                        <img src="{{v(theme::url('assets/images-jpeg/banner-truyen-hinh-fpt.jpg')) }}"
                            alt="Truyền hình FPT" class="img-fluid">
                    </div>
                    <div class="single_slider">
                        <img src="{{v(theme::url('assets/images-jpeg/banner-fsafe-fpt.jpg')) }}" alt="FPT Fsafe"
                            class="img-fluid">
                    </div>
                    <div class="single_slider">
                        <img src="{{ v(theme::url('assets/images-jpeg/banner-play-box-fpt.jpg')) }}" alt="FPT Play Box"
                            class="img-fluid">
                    </div>
                    <!-- Single Slider Start -->
                    <div class="single_slider">
                        <img src="{{ v(theme::url('assets/images-jpeg/banner-camera-fpt.jpg')) }}" alt="FPT Camera"
                            class="img-fluid">
                    </div>
                    <!-- Single Slider End -->
                    <div class="single_slider">
                        <img src="{{ v(theme::url('assets/images-jpeg/banner-internet-fpt.jpg')) }}" alt="Internet FPT"
                            class="img-fluid">
                    </div>
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
                        <li>Tin tức</li>
                        <li>Tin Báo Chí</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="productservice productservice--1">
    <div class="container">
        <div class="col-lg-12 col-12">
            <div class="testimonial-carousel slick-custom slick-custom-default nav-top">
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.newsFPT') }}">
                        <img src="{{ v(theme::url('assets/images/tin tuc fpt.png')) }}" alt="Tin Tức FPT"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.newsFPT') }}">Tin FPT</a>
                    </p>
                </div>
                <div class="single_testimonial text-center active">
                    <a class="productservice__img" href="{{ route('pages.newsPress') }}">
                        <img src="{{ v(theme::url('assets/images/bao chi fpt.png')) }}" alt="Báo Chí FPT"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.newsPress') }}">Tin báo chí</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.newsEmagazine') }}">
                        <img src="{{ v(theme::url('assets/images/tin tuc fpt.png')) }}" alt="Tin eMagazine"
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.newsEmagazine') }}">Tin eMagazine</a>
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
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    @if ($loop->first)
                        <div class="col-lg-8 news__first col-md-6 col-sm-6">
                            <div class="single-blog">
                                <div class="blog-image mb-10">
                                    <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}"><img src="{{ $post->logo->path }}" alt="Tin mới nhất FPT" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 news__first col-md-6 col-sm-6">
                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-content">
                                    <h5 class="news__title mb-10">
                                        <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">
                                            {{ $post->name }}
                                        </a>
                                    </h5>
                                    <ul class="meta">
                                        <li><a href="{{ route('home') }}"><span
                                                    class="news__category">{{ count($post->groups) > 0 ? $post->groups[0]->name : '' }}</span>,{{$post->date}}</a>
                                        </li>
                                    </ul>
                                    <div class="desc">
                                        <p>
                                            {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '', $post->content)), 25) !!}
                                        </p>
                                    </div>
                                    <div><a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}" class="news__more"> Tìm
                                            hiểu</a>
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
                                    <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">
                                        <img src="{{ $post->logo->path }}" alt="{{ $post->name }}" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <h5 class="news__title mb-10">
                                        <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">
                                            {{ $post->name }}
                                        </a>
                                    </h5>
                                    <ul class="meta">
                                        <li><a href="{{ route('home') }}"><span
                                                    class="news__category">{{ count($post->groups) > 0 ? $post->groups[0]->name : '' }}</span>,{{$post->date}}</a>
                                        </li>
                                    </ul>
                                    <div class="desc">
                                        <p>
                                            {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '', $post->content)), 25) !!}
                                        </p>
                                    </div>
                                    <div><a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}" class="news__more"> Tìm
                                            hiểu</a>
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
                {{ $posts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
