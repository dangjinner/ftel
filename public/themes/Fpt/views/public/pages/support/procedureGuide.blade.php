@extends('public.layout')

@section('content')
@section('css')
    <style>
        .pay-info-desktop{
            padding: 0 15px;
        }
        .tab-huongdanthutuc{
            display: flex;
            flex-wrap: wrap;
            border-bottom: none;
        }
        .tab-huongdanthutuc > li{
            width: 25%;
            flex-basis: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #f36f20;
        }
        .tab-huongdanthutuc > li.active,
        .tab-huongdanthutuc > li:hover{
            background: #ebebeb;
        }
        .tab-huongdanthutuc > li:first-child {
            border-left: 1px solid #f36f20;
        }
        .tab-huongdanthutuc > li:last-child{
            border-right: 1px solid #f36f20;
        }
        .tab-huongdanthutuc > li > a{
            cursor: pointer;
            border-top: 0;
            border-bottom: 0;
            text-transform: uppercase;
            border-radius: 0;
            margin-right: 0;
            padding: 25px;
            width: 100%;
            text-align: center;
            font-weight: 700;
        }
        .tab-huongdanthutuc > li > a.active{
            color: #f36f20;
        }
        .tab-content-huongdan .tab-pane.active {
            background: #ebebeb;
        }
    </style>
@endsection
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
                        <li>Hướng dẫn thủ tục</li>
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
                <div class="single_testimonial text-center active">
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
                        <a href="{{ route('pages.support.privacyPolicy') }}" alt="Điều khoản bảo mật">Điều khoản bảo mật</a>
                    </p>
                </div>
                <div class="single_testimonial text-center">
                    <a class="productservice__img" href="{{ route('pages.support.faq') }}">
                        <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-5.png')) }}"
                            alt="Câu hỏi thường gặp" class="img-fluid">
                    </a>
                    <p>
                        <a href="{{ route('pages.support.faq') }}" alt="Điều khoản bảo mật">Câu hỏi thường gặp</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-category-area mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-title block__orange">
                    <h2>
                        <span class="block__image">
                            <img alt="" src="{{ v(theme::url('assets/images/title-2.png')) }}">
                        </span>
                        CHÍNH SÁCH - THỦ TỤC
                    </h2>
                    <p style="width: 100%; margin-bottom:10px; padding: 10px 10px;background: #f06e28;color: white;">
                        <strong>Chính sách thủ tục</strong>
                    </p>

                    <p style="width: 100%; margin-bottom:10px;">Ngoài các quy định về cung cấp sử dụng dịch vụ được quy
                        định tại Hợp đồng cung cấp và sử dụng dịch vụ đã ký kết giữa Khách hàng và FPT Telecom, Khách
                        hàng cần lưu ý và thực hiện các chính sách sau của FPT Telecom trong quá trình sử dụng dịch vụ:
                    </p>

                    <div class="faq-accordion">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($polices as $item)
                        <div class="card">
                            <div class="card-header" id="heading{{$i}}">
                                <h5 class="mb-0">
                                    <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$i}}"
                                        aria-expanded="false" aria-controls="collapse{{$i}}">
                                        {{ $item->call_to_action_url }}
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="content-answer">
                                        {!! $item->feature_desc !!}
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
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-xs-12 block__orange">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/title-2.png')) }}">
                </span>
                Bảng giá
            </h2>
        </div>
        <div class="col-xs-12 table-responsive mar-tbl-responsive block__orange">
            {!! $banggiachinhsach->feature_desc !!}
        </div>
        <div class="col-xs-12 block__orange" style="margin-top:20px;">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/title-2.png')) }}">
                </span>
                Thông tin thanh toán
            </h2>
        </div>
        <div class="col-xs-12 tabs-info-pay pay-info-desktop">
            <!-- pay-info-desktop -->
            <ul class="nav nav-tabs tab-huongdanthutuc">
                @php
                $i = 1;
                @endphp
                @foreach ($billingInformation as $item)
                <li class="{{ $loop->first ? 'active' : ''}}">
                    <a aria-expanded="" data-toggle="tab" href="#tabs{{$i}}" class="{{ $loop->first ? 'active' : ''}}">{{ $item->call_to_action_url }}</a>
                </li>
                @php
                $i++;
                @endphp
                @endforeach
            </ul>
            <div class="tab-content tab-content-huongdan">
                @php
                $i = 1;
                @endphp
                @foreach ($billingInformation as $item)
                    <div class="tab-pane fade {{ $loop->first ? 'active in show' : ''}}" id="tabs{{$i}}" style="padding:30px;">
                        {!! $item->feature_desc !!}
                    </div>
                @php
                $i++;
                @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.tab-huongdanthutuc li a').click(function(){
                $('.tab-huongdanthutuc li').removeClass('active');
                $(this).parent().addClass('active');
            });
        });
    </script>
@endsection
