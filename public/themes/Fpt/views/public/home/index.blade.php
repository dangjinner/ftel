@extends('public.layout')
@section('css')
    <style>
        .newsKM img{
            height: 210px;
            min-height: 210px;
            max-height: 210px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <!--=====================
    Breadcrumb Aera Start
    =========================-->
        <div class="slider__banner mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 slider__inner">
                        @include('public.layouts.slider')
                    </div>
                </div>
            </div>
        </div>

        <section class="support">
            <div class="container support__container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 text-center support--left">
                        <a href="{{ route('pages.register') }}" title="Đăng ký Online">
                            <img  src="{{ v(theme::url('assets/images/dang ky online.png')) }}" alt="Đăng ký online">
                        </a>

                        <p>
                            <a href="{{ route('pages.register') }}" title="Đăng ký Online" class="text-uppercase">Đăng ký Online</a></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center support--center">
                            <a href="tel:{{ setting('fpt_hotline') }}" title="{{ setting('fpt_hotline') }}">
                                <img  src="{{ v(theme::url('assets/images/call111.png')) }}" alt="Hotline bán hàng: {{ setting('fpt_hotline') }}">
                            </a>
                            <p>
                                <a href="tel:{{ setting('fpt_hotline') }}" title="{{ setting('fpt_hotline') }}" class="text-uppercase">Hotline : {{ setting('fpt_hotline') }}</a>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center support--right">
                            <a href="{{ route('pages.support.contact') }}" title="Điểm giao dịch">
                                <img  src="{{ v(theme::url('assets/images/dia diem giao dich fpt.png')) }}" alt="Địa điểm giao dịch FPT">
                            </a>

                            <p>
                                <a href="#" title="Điểm giao dịch" class="text-uppercase">Điểm giao dịch</a>
                            </p>
                        </div>

                    </div>
                </div>
        </section>

        <section class="productservice">
            <div class="container">
                <div class="col-lg-12 col-12">
                    <div class="block-title">
                        <h6>
                        SẢN PHẨM DỊCH VỤ
                        </h6>
                    </div>
                    <div class="testimonial-carousel slick-custom slick-custom-default nav-top">
                        @foreach ($menus->menuItems as $menu)
                            <div class="single_testimonial text-center">
                                <a href="{{ $menu->url }}">
                                    <img src="{{  $menu->background_image->path }}"
                                        alt="{{ $menu->name }}" class="img-fluid"></a>

                                <span class="job_title">
                                    <img src="{{  $menu->background_image_2->path }}"
                                        alt="{{ $menu->name }}"></span>
                                <p>{{ $menu->description }}</p>
                                <span class="name"> <a title="" href="{{ $menu->url }}">Xem thêm</a></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="news newsKM">
            <div class="container">
                <div class="row mt-20 mb-20">
                    <div class="col-lg-12">
                        <div class="block-title">
                            <h6>
                            KHUYẾN MẠI
                            </h6>
                        </div>
                    </div>
                    @php
                    $patternFirstBox = '/\[(box).(.*?)\]/';
                    $patternEndBox = '/\[\/box\]/';
                    @endphp
                    @foreach ($postsKM as $post)
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
                                    <div><a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}" class="news__more"> Tìm hiểu</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog End -->
                        </div>
                    @endforeach
                </div>
                <div><a href="{{ route('pages.sale') }}" class="news__more"> Xem thêm</a></div>
            </div>
        </section>
        <div class="latest-post-area mt-50 newsslider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="block-title">
                            <h2>TIN TỨC</h2>
                        </div>
                        <div class="blog-post-carousel slick-custom slick-custom-default nav-top">
                            <div class="blog-post-container">
                                <div class="single_blog mb-35">
                                    <div class="blog_thumb single-banner">
                                        <a href="{{ route('pages.newsPress') }}"><img src="{{ v(theme::url('assets/images/news.png')) }}" alt="Tin báo chí FPT" class="img-fluid"></a>
                                        <h3>
                                        <a href="{{ route('pages.newsPress') }}" title="Tin báo chí" class="text-uppercase bold">Tin báo chí</a>
                                        </h3>
                                    </div>
                                    <ul class="blog_content">
                                        @foreach ($postsPress as $post)
                                            <li>
                                                <h6>
                                                    <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                                </h6>
                                                <div class="date_post mt-15 mb-15">
                                                    <span>{{ $post->date }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="news__learnmore">
                                            <h6><a href="{{ route('pages.newsPress') }}">Xem thêm</a></h6>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="blog-post-container">
                                <div class="single_blog mb-35">
                                    <div class="blog_thumb single-banner">
                                        <a href="{{ route('pages.newsEmagazine') }}"><img src="{{ v(theme::url('assets/images/press.png')) }}" alt="Tin báo chí FPT" class="img-fluid"></a>
                                        <h3>
                                        <a href="{{ route('pages.newsEmagazine') }}" title="Tin báo chí" class="text-uppercase bold">Tin  eMagazine</a>
                                        </h3>
                                    </div>
                                    <ul class="blog_content">
                                        @foreach ($postsEmagazine as $post)
                                        <li>
                                            <h6>
                                                <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                            </h6>
                                            <div class="date_post mt-15 mb-15">
                                                <span>{{ $post->date }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="news__learnmore">
                                            <h6><a href="{{ route('pages.newsEmagazine') }}">Xem thêm</a></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-post-container">
                                <div class="single_blog mb-35">
                                    <div class="blog_thumb single-banner">
                                        <a href="{{ route('pages.newsFPT') }}"><img src="{{ v(theme::url('assets/images/e-mag-small-1.png')) }}" alt="Tin báo chí FPT" class="img-fluid"></a>
                                        <h3>
                                        <a href="{{ route('pages.newsFPT') }}" title="Tin báo chí" class="text-uppercase bold">Tin FPT</a>
                                        </h3>
                                    </div>
                                    <ul class="blog_content">
                                        @foreach ($postsFPT as $post)
                                        <li>
                                            <h6>
                                                <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                            </h6>
                                            <div class="date_post mt-15 mb-15">
                                                <span>{{ $post->date }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="news__learnmore"><h6><a href="{{ route('pages.newsFPT') }}">Xem thêm</a></h6></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
