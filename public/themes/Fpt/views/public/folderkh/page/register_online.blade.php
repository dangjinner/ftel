@extends('public.folderkh.layout')

@section('css')
<style>
    div.gift-cam {
        position: relative;
        padding: 12px 10px;
        color: #4EB848;
        background: rgba(78, 184, 72, 0.1);
    }
    .gift-cam::before {
        width: 24px;
        height: 24px;
        margin-top: -12px;
        display: block;
        position: absolute;
        top: 50%;
        left: 10px;
        background-image: url(https://fpt.vn/shop/html/assets/images/camera/ico-gift.svg);
        background-color: transparent;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center top;
        background-position: 0 0;
        content: "";
    }
    div.gift-cam p{
        color: #4EB848;
        padding-left: 30px;
    }
    p.hasIframe {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    p.hasIframe iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    div.btn-center{
        text-align: center;
    }
    @media (max-width: 767px){
        .modal-dialog.modal-dialog-centered{
            min-width: 100%;
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')
<main>
    <div class="single-banner">
        <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online FPT"
            class="img-fluid">
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
                            <li>Đăng ký Online</li>
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
                        <a class="productservice__img" href="#internet-fpt">
                            <img src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}" alt="Internet FPT"
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="#internet-fpt" alt="INTERNET FPT">INTERNET FPT</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="#truyen-hinh-fpt">
                            <img src="{{ v(theme::url('assets/images/icon/tv fpt.png')) }}" alt="Truyền hình FPT"
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="#truyen-hinh-fpt" alt="TRUYỀN HÌNH FPT"> TRUYỀN HÌNH FPT </a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="#combo-internet-th">
                            <img src="{{ v(theme::url('assets/images/icon/combo net tv fpt.png')) }}"
                                alt="Combo Internet FPT" class="img-fluid">
                        </a>
                        <p>
                            <a href="#combo-internet-th" alt="Net + Truyền hình FPT"> COMBO INTERNET + TRUYỀN HÌNH</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="#fpt-camera">
                            <img src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}" alt="FPT Camera"
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="#fpt-camera" alt="FPT CAMERA"> FPT CAMERA </a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="#fpt-play-box">
                            <img src="{{ v(theme::url('assets/images/icon/fpt play box.png')) }}" alt="FPT Play Box"
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="#fpt-play-box" alt="FPT PLAY BOX">FPT PLAY BOX</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="#fpt-ihome">
                            <img src="{{ v(theme::url('assets/images/icon/home fpt.png')) }}" alt="FPT iHOME"
                                class="img-fluid" alt="FPT iHome" class="img-fluid">
                        </a>
                        <p>
                            <a href="#fpt-ihome" alt="FPT PLAY BOX">FPT iHOME</a>
                        </p>
                    </div>
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

                    <select name="tinh1" id="tinh1">
                        <option value="">-- Chọn --</option>
                        @foreach ($provinces as $key => $value)
                        <option value="{{ route('customer.register.online', ['locationId' => $key]) }}"
                            {{ request()->get('locationId') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
    <div class="pricing pricing--shop" id="internet-fpt">
        <div class="container">
            <div class="row">
                <div class="pricing__title">
                    <img alt="Combo Internet &amp; Truyền hình FPT"
                        src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}">
                    <a href="{{ route('pages.internetFpt') }}">Gói cước Internet FPT</a>
                </div>
            </div>
            <?php
                function getClassColor($i){
                    switch ($i) {
                        case 1:
                        case 5:
                            return 'blue';
                        case 2:
                        case 6:
                            return 'oranges';
                        case 3:
                        case 7:
                            return 'green';
                        case 4:
                        case 8:
                            return 'purple';
                        default:
                            return '';
                    }
                }
            ?>
            <div class="pricing--4 slick-custom slick-custom-default">
                <?php $i = 1;  ?>
                @foreach ($service_internetFpt as $item)
                {{-- @php
                    dd($item);
                @endphp --}}
                <div class="pricing__col {{getClassColor($i)}}">
                    <div class="pricing__inner">
                        @if ($item->base_image_icon->path)
                        <div class="top">
                            <div>
                                <div class="img-combo">
                                    <span><img alt="{{$item->name}}" src="{{ $item->base_image->path }}"></span>
                                </div>
                                <div class="price">
                                    <span class="img-package">
                                        <img src="{{ $item->base_image_icon->path }}" alt="net-ico-100.png">
                                    </span>
                                    <p><b>{{$item->bandwidth}}</b>Mbps</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="top">
                            <div>
                                <div class="img-combo"><span><img alt="Combo cáp quang FPT 25MB"
                                            src="{{ $item->base_image->path }}"></span>
                                </div>
                                <div class="price">
                                    @if($item->price_area_discount != null)

                                            <h4>{{ number_format($item->price_area_discount,0,",",".") }}
                                            </h4>
                                    @else
                                    <h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>
                                    @endif
                                    <span>vnđ/ tháng</span>
                                    <p><b>{{ $item->bandwidth }}</b>Mbps</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        {!! $item->feature !!}
                        <div class="bottom">
                            @if ($item->base_image_icon->path)
                            <p>Các thiết bị đi kèm/ IP tĩnh được kinh doanh theo chính sách hiện hành tại từng thời điểm
                            </p>
                            @else
                            <p>Mức giá trên đã bao gồm VAT.</p>
                            @endif
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
                <?php
                    $i++;
                ?>
                @endforeach
            </div>
        </div>
    </div>
    <section class="package pricing pricing--shop" id="truyen-hinh-fpt">
        <div class="container">
            <div class="row">
                <div class="pricing__title">
                    <img alt="Combo Internet &amp; Truyền hình FPT"
                        src="{{ v(theme::url('assets/images/icon/tv fpt.png')) }}">
                    <a href="{{ route('pages.maxyTv') }}">Gói cước truyền hình FPT</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-lg-6 package__left">
                    <h2>GÓI KÊNH MAXY<br>TỪ 85.000 Đồng/Tháng</h2>
                    <ul>
                        <li>Gần 200 kênh truyền hình trong nước và quốc tế hấp dẫn (trong đó có gần 70 kênh chuẩn HD).
                        </li>
                        <li>Xem miễn phí các nội dung của Truyền hình FPT: Phim truyện, Giải trí, Thể thao, Thiếu nhi,
                            Trực tiếp, Học tập, KaraTivi…</li>
                    </ul>
                    <p class="package__vat">*Giá trên chưa bao gồm VAT<br>
                        (Áp dụng từ ngày 01/03/2021)
                    </p>
                    <div class="btn-center">
                         <a class="package__viewmore" href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký ngay</a>
                    </div>
                    <!--<a class="package__viewmore" href="{{ route('pages.maxy') }}">Xem Thêm</a>-->

                </div>
                <div class="col-xs-6 col-lg-6 package__right">
                    <h2>Truyền hình FPT thay áo mới</h2>
                    <!--<h2>GÓI MỞ RỘNG<br>TỪ 30.000 Đồng/Tháng</h2>-->
                    <!--<ul>-->
                    <!--    <li>Gần 200 kênh truyền hình trong nước và quốc tế hấp dẫn&nbsp; (trong đó có gần 70 kênh chuẩn-->
                    <!--        HD).</li>-->
                    <!--    <li>K+ HD</li>-->
                    <!--    <li>Danet</li>-->
                    <!--    <li>Galaxy Play</li>-->
                    <!--</ul>-->
                    <!--<p class="package__vat">*Giá trên chưa bao gồm VAT<br>-->
                    <!--    (Áp dụng từ ngày 01/03/2021)-->
                    <!--</p>-->
                    <p class="hasIframe">
                        <iframe title="YouTube video player" src="https://www.youtube.com/embed/AMI-W9hh0AU" width="100%" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    </p>
                    <div class="btn-center">
                         <a class="package__viewmore" href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký ngay</a>
                    </div>
                    <!--<a class="package__viewmore" href="{{ route('pages.maxy') }}">Xem Thêm</a>-->
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
                    <select name="netTv_province" id="netTv_province">
                        <option value="">-- Chọn --</option>
                        @foreach ($provinces as $key => $value)
                        <option value="{{ route('customer.register.online', ['locationId' => $key]) }}"
                            {{ request()->get('locationId') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
    <div class="pricing pricing--shop pricing--shop1" id="combo-internet-th">
        <div class="container">
            
            <div class="row">
                <div class="pricing__title">
                    <img alt="GÓI CƯỚC COMBO INTERNET & TRUYỀN HÌNH  FPT 2 TRONG 1 CỰC SỐC"
                        src="{{ v(theme::url('assets/images/icon/combo net tv fpt.png')) }}">
                    <a href="{{ route('pages.netTv') }}">Combo internet & Truyền hình FPT</a>
                </div>
            </div>
            <?php
                function getClassColor2($index){
                    switch ($index) {
                        case 1:
                            return 'blue';
                        case 2:
                            return 'oranges';
                        case 3:
                            return 'green';
                        case 4:
                            return 'purple';
                        case 5:
                            return 'yellow_o';
                        case 6:
                            return 'red_p';
                        default:
                            return '';
                    }
                }
            ?>
            <div class="pricing--4 slick-custom slick-custom-default">
                <?php
                    $index = 1;
                ?>
                @foreach ($service_comboInternet as $item)
                <div class="pricing__col {{getClassColor2($index)}}">
                    <div class="pricing__inner">
                        <div class="top">
                            <div>
                                <div class="img-combo"><span><img alt="Combo FPT 25MB"
                                            src="{{ $item->base_image->path }}"></span>
                                </div>
                                <div class="price">

                                    <!--@if($item->price_area_discount != null)-->

                                    <!--        <h4>{{ number_format($item->price_area_discount,0,",",".") }}-->
                                    <!--        </h4>-->
                                    <!--@else-->
                                    <!--<h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>-->
                                    <!--@endif-->
                                     @if($area_id != null)
                                        @if ($item->areas($area_id)->count() > 0)
                                            @if ($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area_discount)
                                                <h4>{{ number_format($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area_discount,0,",",".") }}
                                                </h4>
                                            @else
                                                <h4>{{ number_format($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area,0,",",".") }}
                                                </h4>
                                            @endif
                                        @else
                                            <h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>
                                        @endif
                                    @else
                                        <h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>
                                    @endif
                                    <span>vnđ/ tháng</span>
                                    <p><b>{{ $item->bandwidth }}</b>Mbps</p>
                                </div>
                            </div>
                        </div>
                        {!! $item->feature !!}
                        <div class="bottom">
                            <p>Mức giá trên đã bao gồm VAT. Giá này sẽ thay đổi theo khu vực, theo từng thời điểm.</p>
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
                <?php
                    $index++;
                ?>
                @endforeach
            </div>
        </div>
    </div>
    <section class="quality pricing" id="fpt-camera">
        <div class="container">
            <div class="row">
                <div class="pricing__title">
                    <img alt="Gói cước camera FPT" src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}">
                    <a href="{{ route('pages.fptCamera') }}">Gói cước camera FPT</a>
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
                        @foreach ($services_camfpt as $item)
                        <div class="col-xs-6 col-lg-6 col-md-6 quality__left">
                            <div class="quality__inner">
                                <div class="quality__content row">
                                    <div class="quality__img col-lg-4 col-sm-4">
                                        <img src="{{ $item->base_image->path }}" alt="">
                                    </div>
                                    <div class="quality__text col-lg-8 col-sm-8">
                                        {!! $item->feature !!}
                                        <p>Giá: {{ $item->price->format() }}</p>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="gift-cam">
                                            <p>Miễn phí 6 tháng cloud.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row quality__camera">
                                    <div class="col-6">
                                        <div class="font-weight-bold quality__text">{{ $item->name }}</div>
                                    </div>
                                    <div class="col-6">
                                        <!--<a href="{{ route('pages.fptCamera') }}">-->
                                        <!--    Xem chi tiết-->
                                        <!--</a>-->
                                        <!--<br>-->
                                        <!--<br>-->
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="menu1">
                    <div class="quality__card row">
                        @foreach ($services_cloud as $item)
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
                                    <p class="quality__price"><span
                                            class="text-bold">{{number_format($item->price->amount(),0,",",".")}}</span>
                                    </p>
                                    <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                                </div>
                                <div class="quality__body">
                                    {!! $item->feature !!}
                                </div>
                                <div class="quality__footer">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter" >
                                        Đăng ký
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
    <section class="fptplaybox" id="fpt-play-box">
        <div class="container">
            <div class="row">
                <div class="pricing__title">
                    <img alt="GÓI CƯỚC FPT PLAY BOX" src="{{ v(theme::url('assets/images/icon/fpt play box.png')) }}">
                    <a href="{{ route('pages.playBox') }}">GÓI CƯỚC FPT PLAY BOX</a>
                </div>
            </div>
            <div class="row shop-wrapper grid_3">
                @foreach ($services_fptplaybox as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                    <!-- Single-Product-Start -->
                    <div class="item-product pt-0">
                        <div class="product-thumb">
                            <a href="{{ route('pages.playBox') }}">
                                <img src="{{ $item->base_image->path }}" alt="FPT iHome" class="img-fluid">
                            </a>
                            <div class="action-link">
                                <a class="quick-view same-link" href="#" title="Quick view" data-toggle="modal"
                                    data-target="#modal_box" data-original-title="quick view"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-caption">
                            <div class="product-name">
                                <a href="{{ route('pages.playBox') }}">{{ $item->name }}</a>
                            </div>
                            <p>{!! $item->feature !!}</p>
                            <div class="rating">
                                <span class="yellow"><i class="fa fa-star"></i></span>
                                <span class="yellow"><i class="fa fa-star"></i></span>
                                <span class="yellow"><i class="fa fa-star"></i></span>
                                <span class="yellow"><i class="fa fa-star"></i></span>
                                <span class="yellow"><i class="fa fa-star"></i></span>
                            </div>
                            <div class="price-box">
                                <span
                                    class="regular-price">{{ number_format($item->price->amount(), 0, ',', '.') }}</span>
                            </div>
                            <div class="cart">
                                <div class="add-to-cart">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single-Product-End -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="product-area fptihome product-details-section" id="fpt-ihome">
        <div class="container">
            <div class="row">
                <div class="pricing__title">
                    <img alt="GÓI CƯỚC FPT iHome" src="{{ v(theme::url('assets/images/icon/home fpt.png')) }}">
                    <a href="{{ route('pages.fptIhome') }}">GÓI CƯỚC FPT iHome</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-12 mt-50">
                    <!-- Product Zoom Image start -->
                    <div class="product-slider-container arrow-center text-center">
                        <div class="product-item">
                            <a href="#"><img src="{{ $services_ihome->base_image->path }}" class="img-fluid"
                                    alt="FPT Telecom" /></a>
                        </div>
                        @foreach ($services_ihome->additional_images as $item)
                        <div class="product-item">
                            <a href="#"><img src="{{ $item->path }}" class="img-fluid" alt="FPT Telecom" /></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="product-details-thumbnail product-slider-mobile arrow-center text-center">
                        <div class="product-item-thumb">
                            <img src="{{ $services_ihome->base_image->path }}" class="img-fluid" alt="FPT Telecom" />
                        </div>
                        @foreach ($services_ihome->additional_images as $item)
                        <div class="product-item-thumb">
                            <img src="{{ $item->path }}" class="img-fluid" alt="FPT Telecom" />
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7 col-12 mt-45">
                    <!-- Product Summery Start -->
                    <a href="{{ route('pages.fptIhome') }}">
                        <h2>{{ $services_ihome->name }}<small>(Gắn trên các loại cửa )</small></h2>
                    </a>
                    <ul>
                        <li>Tên thiết bị: FPT iHome</li>
                        <li>Mã thiết bị: PK-V1</li>
                    </ul>
                    <p class="mb-2"><b>Tính năng chính:</b></p>
                    {!! $services_ihome->feature !!}
                    <!-- Product Summery End -->
                </div>
            </div>
        </div>
        <div class="container fptihome__container">
            <div class="row fptihome__row">
                <div class="col-lg-5 product-details-thumbnail product-slider-pc arrow-center text-center">
                    <div class="product-item-thumb">
                        <img src="{{ $services_ihome->base_image->path }}" class="img-fluid" alt="FPT Telecom" />
                    </div>
                    @foreach ($services_ihome->additional_images as $item)
                    <div class="product-item-thumb">
                        <img src="{{ $item->path }}" class="img-fluid" alt="FPT Telecom" />
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-7">
                    <div class="form-row  price">
                        <div class="col-auto pl-4">
                            <h5 class="m-0 price-text">Giá chỉ:</h5>
                        </div>
                        <div class="col-auto price-number">
                            {{ number_format($services_ihome->price->amount(), 0, ',', '.') }} đ</div>
                    </div>
                    <div class="form-row  buy-now">
                        <div class="col-auto text-right">
                            <h5 class="mb-0 amount-text">Số lượng:</h5>
                        </div>
                        <div class="col-auto">
                            <div class="form-row">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-secondary" onclick="minus()">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control amount-number" value="1" placeholder="1"
                                        id="amount_number">
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-secondary" onclick="plus()">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-auto">
                                    <button id="buy_now" type="button" class="btn btn-info px-md-4" data-toggle="modal" data-target="#exampleModalCenter">Mua ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="support">
        <div class="container">
            <div class="block-title block__orange">
                <h2>
                    <span class="block__image">
                        <img alt="" src="{{ v(theme::url('assets/images/icon/register fpt.png')) }}">
                    </span>
                    ĐĂNG KÝ NGAY
                </h2>
            </div>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-xs-12 col-sm-4 text-center support--left">
                    <a title="Đăng ký Online" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                        <img src="{{ v(theme::url('assets/images/icon/register-fpt.png')) }}" alt="Đăng ký online FPT">
                    </a>
                    <p>
                        <a title="Đăng ký Online" href="#" data-toggle="modal" data-target="#exampleModalCenter" class="text-uppercase">Đăng ký
                            Online</a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 text-center support--center" style="display: none">
                    <a href="tel:0986666348" title="Hotline bán hàng: 0986666348">
                        <img src="{{ v(theme::url('assets/images/icon/hotline-fpt.png')) }}" alt="Hotline bán hàng FPT">
                    </a>
                    <p>
                        <a href="tel:0986666348" title="Hotline bán hàng: 0986666348" class="text-uppercase">Hotline
                            : 0986666348</a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 text-center support--right">
                    <a href="{{ route('pages.userManual') }}" title="Hỗ trợ">
                        <img src="{{ v(theme::url('assets/images/icon/support fpt.png')) }}"
                            alt="Hỗ trợ khách hàng FPT">
                    </a>
                    <p>
                        <a href="{{ route('pages.userManual') }}" title="Hỗ trợ" class="text-uppercase">Hỗ trợ</a>
                    </p>
                </div>
            </div>
        </div>
        
    </section>
    <!--<div id="ace-crm-script-tag-bound">
    <script type="text/javascript">
        var aceCrmLoaded = false;
        var aceCrmDomain = 'https://acecrm.info/';
        var aceParrams = {client_id: 5237583, website_id: 1797};
        (function () {
            if (!aceCrmLoaded) {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.id = "aceCrmScriptTag";
                ga.async = true;
                ga.src = aceCrmDomain + "assets/js/ace-crm-script.js";
                var s = document.getElementsByTagName('script');
                s[0].parentNode.insertBefore(ga, s[0]);
            } else {
                new aceCrm(aceParrams).run();
            }
        })();
    </script>
    </div-->
</main>
@endsection
@section('script')
<script>
    $(document).ready(function(){
            $('#tinh1').on('change', function(){
                if( $(this).val() ){
                    window.location = $(this).val();
                }
            });
            $("#netTv_province").on('change', function() {
                 if( $(this).val() ){
                    window.location = $(this).val();
                }
            });
    });
</script>
@endsection
