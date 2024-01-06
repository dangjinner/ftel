@extends('public.layout')

@include('public.sections.general.custom_rating_for_pages')

@section('content')
<div class="single-banner">
    <img src="{{ $category_services->parent->banner->path }}" alt="Đăng ký online FPT" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
                 @foreach($primaryMenu[0]->children()->get() as $menuItem)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <a href="{{ $menuItem->url }}" @if($loop->iteration == 2) class="active" @endif>{{ $menuItem->name }}</a>
                    </div>
                @endforeach
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
                        @php
                        $menu = $primaryMenu[0]->children()->get();
                        $menuItems = $menu[1]->children()->get();
                        @endphp
                        @foreach($menuItems[2]->getParents() as $menuItem)
                        <li>
                            <a href="{{ $menuItem->url }}">{{ $menuItem->name }}</a>
                        </li>
                        @endforeach
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
              @foreach($menuItems as $menuItem)
                    <div class="single_testimonial text-center @if($menuItem->url === '/'.Request::path()) active @endif">
                        <a class="productservice__img" href="{{ $menuItem->url }}">
                            <img src="{{ $menuItem->background_image->path }}" alt="" class="img-fluid">
                        </a>
                        <p>
                            <a href="{{ $menuItem->url }}" alt="Cáp quang Cá nhân">
                                {{ $menuItem->name }}
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="productservice">
    {!! $category_services->intro !!}
    <div class="col-lg-12 col-12" style="text-align: center;">
        <button id="rut-gon" onclick="closeFunction()"
            style="text-align: center;border: 0px;background: #f37021;border-radius: 30px;padding: 10px 50px 10px 50px;color: #fff;">Rút
            gọn</button>
        <script type="text/javascript">
            function closeFunction(){
                    document.getElementById("rut-gon").style.display = 'none';
                    document.getElementById("detail-content").style.display = 'none' ;
                    document.getElementById("button").style.display = 'block' ;
                        $('html, body').animate({
                        scrollTop: 0
                        }, 600);
                }
                function closeFunctionNotScroll(){
                    document.getElementById("rut-gon").style.display = 'none';
                    document.getElementById("detail-content").style.display = 'none' ;
                    document.getElementById("button").style.display = 'block' ;
                }
                document.addEventListener("DOMContentLoaded", function() {
                    closeFunctionNotScroll();
                });
        </script>
    </div>
    <div class="col-lg-12 col-12" id="button" style="text-align: center;">
        <button onclick="openFunction()"
            style="border: 0px; background-color: red;border-radius: 5px; margin-top: 10px; padding: 5px 20px;    box-shadow: 6px 10px 5px #ccc; ">
            <p id="none" style="display: block;color: #fff">Xem thêm</p>
        </button>

        <script type="text/javascript">
            function openFunction(){
                    document.getElementById("rut-gon").style.display = 'inline-block';
                    document.getElementById("detail-content").style.display = 'block' ;
                    document.getElementById("button").style.display = 'none' ;
                }
        </script>
    </div>
</section>
<section class="feature news">
    <div class="container">
        <div class="block-title block__orange">
            <h2>
                <span class="block__image">
                    <img alt="Đặc điểm FPT" src="{{ v(theme::url('assets/images/icon/function fpt.png'))}}">
                </span>
                ĐẶC ĐIỂM
            </h2>
            <p>
                FPT Play Box+ giúp nâng cấp trải nghiệm giải trí gia đình với các tính năng nổi bật:
            </p>
        </div>
        <div class="feature__row row">
            @foreach ($features as $feature)
            @if($feature->image->path && $feature->feature_desc)
            <div class="col-lg-6 feature__col">
                <div class="feature__icon">
                    <img alt="FTTH-f1.png" src="{{ $feature->image->path }}">
                </div>
                <div class="feature__text">{{ $feature->feature_desc }}</div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<div class="tables tables--1">
    <div class="container tables__container">
        <div class="col-xs-12 text-left tables__inner">
            {!! $table_desc->feature_desc !!}
        </div>
    </div>
</div>
<section class="tutorial">
    <div class="container ">
        <div class="block-title block__orange">
            <h2>
                <span class="block__image">
                    <img alt="ico-price.png" alt="price.png"
                        src="{{ $gia_thiet_bi->image->path }}">
                </span>
                GIÁ THIẾT BỊ
            </h2>
        </div>
        {!! $gia_thiet_bi->feature_desc !!}
    </div>
</section>
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
