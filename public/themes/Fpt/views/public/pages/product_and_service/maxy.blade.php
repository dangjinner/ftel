@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ $category_services->banner->path }}" alt="" class="img-fluid">
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
                        @foreach($menuItems[0]->getParents() as $menuItem)
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
<section class="feature feature--gray">
    <div class="container">
        <div class="block-title row block__orange">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/icon/function fpt.png')) }}">
                </span>
                MỤC - TÍNH NĂNG
            </h2>
        </div>
        @foreach ($features as $feature)
        @if($feature->image->path && $feature->feature_desc)
        <div class="feature__row row">
            <div class="col-xs-12 col-sm-12 row feature__title">
                <h3 class="text-uppercase">
                    <img alt="function-tv" src="{{ $feature->image->path }}"> {{ $feature->call_to_action_url }}
                </h3>
            </div>
            {!! $feature->feature_desc !!}
        </div>
        @endif
        @endforeach
</section>
<div class="tables chinhsachbanhang">
    <div class="container">
        <div class="col-xs-12 row ">
            <div class="block-title row block__orange " style="">
                <h2>
                    <span class="block__image">
                        <img alt="" src="{{ $banner_chinhsachbanhang->image->path }}">
                    </span>
                    CHÍNH SÁCH BÁN HÀNG
                </h2>
            </div>
            {!! $banner_chinhsachbanhang->feature_desc !!}
        </div>
    </div>
</div>
@include('public.sections.support')
@endsection
