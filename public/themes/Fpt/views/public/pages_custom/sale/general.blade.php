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
                             <li>{{ $group->name }}</li>
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
                    @foreach($saleGroups as $group)
                        <div class="single_testimonial text-center @if(Request::path() == $group->parent()->first()->slug.'/'.$group->slug) active @endif ">
                            <a class="productservice__img" href="{{ route('pages.sale.custom', ['slug' => $group->slug]) }}">
                                <img src="{{ $group->logo->path ?? v(theme::url('assets/images/icon/internet fpt.png')) }}" alt=""
                                    class="img-fluid">
                            </a>
                            <p>
                                <a href="{{ route('pages.sale.custom', ['slug' => $group->slug]) }}" alt="INTERNET FPT">{{ $group->name }}</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="searchcity">
        <div class="container">
            <div class="row">
                <div class="page-amount col-lg-4">
                    <i class="fa fas far fa-map-marker" aria-hidden="true"></i>Khu vực đang xem:
                </div>
                <div class="col-lg-4 styled-select">
                    <select name="area" class="select-province">
                        <option value="">-- Chọn --</option>
                        @foreach ($provinces as $key => $value)
                        @php
                  
                        $search = array(
                        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                        '#(ì|í|ị|ỉ|ĩ)#',
                        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                        '#(đ)#',
                        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                        '#(Đ)#',
                        "/[^a-zA-Z0-9\-\_]/",
                        );
                        $replace = array(
                        'a',
                        'e',
                        'i',
                        'o',
                        'u',
                        'y',
                        'd',
                        'A',
                        'E',
                        'I',
                        'O',
                        'U',
                        'Y',
                        'D',
                        '-',
                        );
                        $areaSlug = preg_replace($search, $replace, $value);
                        $areaSlug = preg_replace('/(-)+/', '-', $areaSlug);
                        $areaSlug = strtolower($areaSlug);
                        @endphp
                        <option value="{{ url()->current() .'/'. 'fpt-'.$areaSlug}}">{{ $value }}</option>
                        @endforeach
                    </select>
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
                                <li><a href="#"><span class="news__category">{{ count($item->groups) > 0 ?
                                            $item->groups[0]->name : '' }}</span>,{{$item->date}}</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '',
                                    $item->content)), 25) !!}
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
                                <li><a href="#"><span class="news__category">{{ count($item->groups) > 0 ?
                                            $item->groups[0]->name : '' }}</span>,{{$item->date}}</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    {!! subwords(strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '',
                                    $item->content)), 25) !!}
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