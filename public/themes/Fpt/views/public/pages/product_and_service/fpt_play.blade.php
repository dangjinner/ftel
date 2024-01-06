@extends('public.layout')

@include('public.sections.general.custom_rating_for_pages')

@section('css')
    <link rel="stylesheet" href="{{ v(theme::url('assets/css/jquery.tocify.css')) }}">
    <style>
        .btn.btn-mucluc{
            width: 100%;
            text-align: left;
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
            background: rgba(237,237,237,0.95);
            border-radius: 0;
            border: 1px solid #333;
        }
        #toc ul,
        #toc ul li,
        #toc ul li a{
            display: block;
            width: 100%;
        }
        #toc > ul > li{
            padding-left: 10px;
        }
        .btn.btn-mucluc:focus,
        .btn.btn-mucluc:hover{
            box-shadow: none;
            outline: none;
        }
        .box-mucluc{
            display: none;
        }
        .box {
            padding: 20px;
            background-color: #f6f6f6;
            margin-bottom: 20px;
            word-wrap: break-word;
        }
        .box i {
            line-height: 60px;
            height: 60px;
            width: 60px;
            font-size: 60px;
            margin: 0;
            float: left;
            margin-left: -70px;
        }
        .box div.box-inner-block {
            padding-left: 70px;
            min-height: 50px;
        }

        /* Box shadow */
        .box.shadow {
            border: 1px solid #ddd;
            -webkit-box-shadow: 0 0 5px rgb(153 153 153 / 60%);
            -moz-box-shadow: 0 0 5px rgba(153,153,153,.6);
            box-shadow: 0 0 5px rgb(153 153 153 / 60%);
        }
        .box.shadow div.box-inner-block {
            padding: 0;
        }

        /* Box info */
        .box.info {
            background: #d6f6ff;
            border-color: #bfe3ec;
        }
        .box.info i{
            color: #2cb4da;
        }

        /* Box success */
        .box.success {
            background: #e2f2cb;
            border-color: #d1e4b7;
        }
        .box.success i{
            color: #8ab84d;
        }

        /* Box warning */
        .box.warning {
            background: #fffddb;
            border-color: #e9e59e;
        }

        .box.warning i {
            color: #ecc21b;
        }

        /* Box error */
        .box.error {
            background: #ffe6e2;
            border-color: #eebfb8;
        }
        .box.error i{
            color: #f03317;
        }

        /* Box download */
        .box.download {
            background: #e2f2cb;
            border-color: #d1e4b7;
        }
        .box.download i{
            color: #8ab84d;
        }

        /* Box note */
        .box.note {
            background: #fffddb;
            border-color: #e9e59e;
        }
        .box.note i{
            color: #ecc21b;
        }


        /* Shortcode button */
        a.shortc-button {
            border: none;
            cursor: pointer;
            padding: 0 10px;
            display: inline-block;
            margin: 10px 0 0;
            font-weight: 700;
            outline: none;
            position: relative;
            background: #bdc3c7;
            color: #fff !important;
            text-decoration: none;
            font-size: 10px;
            height: 25px;
            line-height: 25px;
            opacity: .9;
            overflow: hidden;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        a.shortc-button.medium {
            font-size: 14px;
            height: 45px;
            line-height: 45px;
            padding: 0 15px;
        }
        a.shortc-button.big {
            font-size: 24px;
            height: 65px;
            line-height: 65px;
            padding: 0 20px;
        }

        a.shortc-button.red {
            background: #e74c3c;
        }
        a.shortc-button.orange {
            background: #e67e22;
        }
        a.shortc-button.blue {
            background: #3498db;
        }
        a.shortc-button.green {
            background: #2ecc71;
        }
        a.shortc-button.black {
            background: #222;
        }
        a.shortc-button.white {
            background: #ecf0f1;
            color: #333 !important;
        }
        a.shortc-button.pink {
            background: #ff00a2;
        }
        a.shortc-button.purple {
            background: #9b59b6;
        }
        .content_post ul{
            list-style: disc;
            padding: 0;
            margin: 0;
            padding-left: 1rem
        }
        .content_post blockquote p{
            color: #999;
            padding: 0 18px;
            font-size: 18px;
            line-height: 28px;
            font-style: italic;
            border: 4px solid #777;
            border-width: 0 0 0 4px;
        }
        .hasIframe{
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .hasIframe iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .block-title.block__orange > h1{
            color: #f06e28;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #ff6634;
            padding-right: 0px;
            padding-bottom: 4px;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: left;
        }
        .content_post > h1,
        .content_post > h2,
        .content_post > h3,
        .content_post > h4,
        .content_post > h5,
        .content_post > h6,
        .content_post > p{
            margin-bottom: 24px !important;
            margin-top: 24px;
        }
        .content_post p.hidden
        {
            display: none !important;
        }
        @media only screen and (max-width: 475px) {
            .block-title.block__orange > h1{
                font-size: 20px;
            }
        }
    </style>
@endsection
@section('content')
<div class="single-banner">
    <img src="{{ $category_services->parent->banner->path }}" alt="" class="img-fluid">
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
                        @foreach($menuItems[1]->getParents() as $menuItem)
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
</section>
<section class="news news--2">
    <div class="container">
        <div class="row mt-20 mb-20">
            <div class="col-lg-12">
                <div class="block-title row block__orange " style="">
                    <h2>
                        <span class="block__image">
                            <img alt="" src="{{ v(theme::url('assets/images/icon/function fpt.png'))}}">
                        </span>
                        TÍNH NĂNG
                    </h2>
                </div>
            </div>
            @foreach ($features as $feature)
            @if($feature->image->path || $feature->feature_desc || $feature->call_to_action_url)
            <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                <!-- Single Blog Start -->
                <div class="single-blog text-center">
                    <div class="blog-image mb-10">
                        <a href="#"><img alt="fptplay-function-1.png"
                                src="{{ $feature->image->path }}"></a>
                    </div>
                    <div class="blog-content">
                        <h5 class="news__title mb-10">
                            <a href="#">
                                {{ $feature->call_to_action_url }}
                            </a>
                        </h5>
                        <div class="desc">
                            <p>
                                {{ $feature->feature_desc }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<div class="tables">
    <div class="container">
        <div class="col-xs-12 row ">
            <div class="block-title row block__orange " style="">
                <h2>
                    <span class="block__image">
                        <img alt="" src="{{ v(theme::url('assets/images/icon/price fpt.png'))}}">
                    </span>
                    TIỀN DỊCH VỤ
                </h2>
            </div>
            <p style=" width: 100%;margin-bottom: 15px;"><strong>
                    <span style="color:#ff6600;">►</span> <span style="color:#ff6600;">TIỀN&nbsp;DỊCH
                        VỤ:</span></strong>
            </p>
            <!--{!! $table_desc->feature_desc !!}-->
           <div class="content_post">
                @foreach($fptPlayServices->services as $service)
                {!! $service->feature !!}
                @endforeach
            </div>

        </div>
    </div>
</div>
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
