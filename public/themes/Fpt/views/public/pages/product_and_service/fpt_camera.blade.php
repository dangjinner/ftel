@extends('public.layout')

@include('public.sections.general.custom_rating_for_pages')

@section('content')
<div class="single-banner">
    <img src="{{ $category_services_camfpt->parent->banner->path }}" alt="" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
               @foreach($primaryMenu[0]->children()->get() as $menuItem)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <a href="{{ $menuItem->url }}" @if($loop->iteration == 4) class="active" @endif>{{ $menuItem->name }}</a>
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
                        <li>Sản phẩm dịch vụ</li>
                        <li>Smart Home</li>
                        <li>Fpt Camera</li>
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
                    <a class="productservice__img" href="{{ route('pages.fptCamera') }}">
                        <img src="{{ v(theme::url('assets/images/icon/cap quang ca nhan fpt.png'))}}" alt=""
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.fptCamera') }}" alt="FPT Camera">FPT Camera</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.fptIhome') }}">
                        <img src="{{ v(theme::url('assets/images/icon/cap quang doanh nghiep fpt.png'))}}" alt=""
                            class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.fptIhome') }}" alt="Cáp quang doanh nghiệp">FPT iHome</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="productservice">
    {!! $category_services_camfpt->parent->intro !!}
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

<section class="quality pricing" id="fpt-camera">
    <div class="container">
        <div class="row">
            <div class="pricing__title">
                <img alt="GÓI CƯỚC CAMERA FPT" src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}">
                GÓI CƯỚC CAMERA FPT
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item col-lg-6 col-6">
                <a class="nav-link font-weight-bold active show" data-toggle="tab" href="#home1">
                    <img src="{{ v(theme::url('assets/images/icon/camera trong nha fpt.png')) }}"> Camera FPT
                </a>
            </li>
            <li class="nav-item col-lg-6 col-6">
                <a class="nav-link font-weight-bold" data-toggle="tab" href="#menu1">
                    <img src="{{ v(theme::url('assets/images/icon/camera ngoai troi fpt.png')) }}">Gói Cloud
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home1">
                <div class="row">
                    @foreach ($category_services_camfpt->services as $item)
                        <div class="col-xs-6 col-lg-6 col-md-6 quality__left">
                            <div class="quality__inner">
                                <div class="quality__content row">
                                    <div class="quality__img col-lg-4 col-sm-4">
                                        <img src="{{ $item->base_image->path }}" alt="">
                                    </div>
                                    {!! $item->feature !!}
                                </div>
                                <div class="row quality__camera">
                                    <div class="col-6">
                                        <div class="font-weight-bold quality__text">{{ $item->name }}</div>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" data-toggle="modal" data-target="#modalRegisterService">
                                            Đăng ký ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="menu1">
                <div class="quality__card row">
                    @foreach ($category_services_cloud->services as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="quality__inner">
                                @if ($item->is_hot)
                                    <div class="quality__logo">
                                        <img alt="hot" src="{{ v(theme::url('assets/images/icon/tick hot fpt.png'))}}">
                                    </div>
                                    <div class="quality__star">
                                        <img alt="star" src="{{ v(theme::url('assets/images/icon/star fpt.png'))}}">
                                    </div>
                                @endif
                                <div class="quality__header text-center px-3 pt-4 pb-0">
                                    <h4>{{$item->name}}</h4>
                                    <p class="quality__price"><span class="text-bold">{{number_format($item->price->amount(),0,",",".")}}</span></p>
                                    <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                                </div>
                                <div class="quality__body">
                                    {!! $item->feature !!}
                                </div>
                                <div class="quality__footer">
                                    <a href="#" data-toggle="modal" data-target="#modalRegisterService">
                                        Đăng ký ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
