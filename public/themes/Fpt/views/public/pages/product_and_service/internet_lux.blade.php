@extends('public.layout')

@include('public.sections.general.custom_rating_for_pages')

@section('content')
<div class="single-banner">
    <img src="{{ $category_services->banner->path ?? $category_services->parent->banner->path }}" alt="" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
                @foreach($primaryMenu[0]->children()->get() as $menuItem)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <a href="{{ $menuItem->url }}" @if($loop->iteration == 1) class="active" @endif>{{ $menuItem->name }}</a>
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
                            $menuItems = $menu[0]->children()->get();
                        @endphp
                        @foreach($menuItems[3]->getParents() as $menuItem)
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
                            <img src="{{ $menuItem->background_image->path }}" alt=""
                                class="img-fluid">
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

<section class="searchcity">
    <div class="container">
        <div class="row">
            <div class="page-amount col-lg-4">
                <i class="fa fas far fa-map-marker" aria-hidden="true"></i>Khu vực đang xem:
            </div>
            <div class="col-lg-4 styled-select">
                <select name="tinh1" id="tinh1" class="select-province">
                    <option value="">-- Chọn --</option>
                    @foreach ($provinces as $key => $value)
                    <option value="{{ url()->current() .'?'. 'locationId='.$key}}"
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
                <img alt="Combo Internet &amp; Lux"
                    src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}">
                Gói cước Internet Lux
            </div>
        </div>
        <?php
            function getColorClass($index)
            {
                switch ($index) {
                    case 1:
                        return 'blue';
                    case 2:
                        return 'oranges';
                    case 3:
                        return 'green';
                    case 4:
                        return 'purple';
                    default:
                        return '';
                }
            }
        ?>
        <div class="pricing--4 slick-custom slick-custom-default">
            <?php
                $i = 1;
            ?>
            @foreach ($category_services->services as $service)
            <div class="pricing__col {{ getColorClass($i) }}">
                <div class="pricing__inner">
                    <div class="top">
                        <div>
                            @if($service->is_show_title)
                            {!! $service->title !!}
                            @else
                            <div class="img-combo"><span><img alt="" src="{{ $service->base_image->path }}"></span>
                            </div>
                            @endif
                            <div class="price">
                                @if($area_id != null)
                                    @if ($service->areas($area_id)->count() > 0)
                                        @if ($service->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area_discount)
                                            <h4>{{ number_format($service->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area_discount,0,",",".") }}
                                            </h4>
                                        @else
                                            <h4>{{ number_format($service->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area,0,",",".") }}
                                            </h4>
                                        @endif
                                    @else
                                        <h4>{{ number_format($service->price->amount(),0,",",".") }}</h4>
                                    @endif
                                @else
                                    <h4>{{ number_format($service->area_services()->orderBy('price_area','ASC')->first()->pivot->price_area,0,",",".") }}</h4>
                                @endif
                                {{-- <h4>{{number_format($service->price->amount(),0,",",".")}}</h4> --}}
                                <span>vnđ/ tháng</span>
                                   <p><b>{{$service->bandwidth}}</b>
                                    @if(is_numeric($service->bandwidth)) Mbps @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    {!! $service->feature !!}
                    <div class="bottom">
                        @if($service->bonus)
                            {!! $service->bonus !!}
                        @else
                            <p>Mức giá trên đã bao gồm VAT. Giá này sẽ thay đổi theo khu vực, theo từng thời điểm.</p>
                        @endif
                        <!--<a href="{{ route('pages.register', ['service' => 'Internet FPT']) }}">Đăng ký ngay</a>-->
                        <a href="#" data-toggle="modal" data-target="#modalRegisterService">Đăng ký ngay</a>
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
<section class="productservice productservice--1">
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
<section class="feature">
    <div class="container">
        <div class="block-title block__orange">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/icon/function fpt.png')) }}">
                </span>
                TÍNH NĂNG
            </h2>
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
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.select-province').on('change', function(){
                if( $(this).val() ){
                    window.location = $(this).val();
                }
            });
        });
    </script>
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
