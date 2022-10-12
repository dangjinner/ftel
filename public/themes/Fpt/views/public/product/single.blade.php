@extends('public.layout')
@push('styles')
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ Theme::url('assets/product/rs-plugin/css/settings.css') }}"
    media="screen" />
<!-- StyleSheets -->
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/main.css') }}">
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/style.css') }}">
<link rel="stylesheet" href="{{ Theme::url('assets/product/css/responsive.css') }}">
<!-- JavaScripts -->
<script src="{{ Theme::url('assets/product/js/vendors/modernizr.js') }}"></script>
<style>
    #blog-slide img.img-responsive {
        height: 210px;
        min-height: 210px;
        max-height: 210px;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
<form action="{{ route('cart.items.store') }}" method="post" id="formAddToCart">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="qty" id="qty" value="1">
</form>
<!-- Linking -->
<div class="linking">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('product.shop') }}">Home</a></li>
            {!! $categoryBreadcrumb !!}
        </ol>
    </div>
</div>
<!-- Content -->
<div id="content">
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
        <div class="container">
            <div class="row">
                @include('public.product.sidebar')
                <!-- Products -->
                <div class="col-md-9">
                    <div class="product-detail">
                        <div class="product">
                            <div class="row">
                                <!-- Slider Thumb -->
                                <div class="col-xs-5">
                                    <article class="slider-item on-nav">
                                        <div id="slider" class="flexslider">
                                            <ul class="slides">
                                                <li>
                                                    <img src="{{ $product->base_image->path }}"
                                                        alt="{{ $product->base_image->name }}">
                                                </li>
                                                @forelse ($product->additional_images as $image)
                                                <li>
                                                    <img src="{{ $image->path }}"
                                                        alt="{{ $image->name }}">
                                                </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div id="carousel" class="flexslider">
                                            <ul class="slides">
                                                <li>
                                                    <img src="{{ $product->base_image->path }}"
                                                        alt="{{ $product->base_image->name }}">
                                                </li>
                                                @forelse ($product->additional_images as $image)
                                                <li>
                                                    <img src="{{ $image->path }}"
                                                        alt="{{ $image->name }}">
                                                </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <!-- Item Content -->
                                <div class="col-xs-7">
                                    <span class="tags">{{ join(', ', $product->tags->pluck('name')->toArray()) }}</span>
                                    <h5>{{ $product->name }}</h5>
                                    @php
                                    $avg_rating = round($product->reviews->avg->rating) ?? 0;
                                    @endphp
                                    <p class="rev">
                                        @for ($i = 0; $i < $avg_rating; $i++)
                                        <i class="fa fa-star"></i>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $avg_rating; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                        <span class="margin-left-10">{{ $product->reviews->count() }}
                                            Review(s)</span>
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6"><span class="price">{{ $product->selling_price->format() }} </span></div>
                                        <div class="col-sm-6">
                                            <p>Availability: <span class="in-stock">In stock</span></p>
                                        </div>
                                    </div>
                                    <!-- List Details -->
                                    <ul class="bullet-round-list">
                                        <li>Screen: 1920 x 1080 pixels</li>
                                        <li>Processor: 2.5 GHz None</li>
                                        <li>RAM: 8 GB</li>
                                        <li>Hard Drive: Flash memory solid state</li>
                                        <li>Graphics : Intel HD Graphics 520 Integrated</li>
                                        <li>Card Description: Integrated</li>
                                    </ul>
                                    {{-- <!-- Colors -->
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="clr"> <span style="background:#068bcd"></span> <span
                                                    style="background:#d4b174"></span> <span
                                                    style="background:#333333"></span> </div>
                                        </div>
                                        <!-- Sizes -->
                                        <div class="col-xs-7">
                                            <div class="sizes"> <a href="#.">S</a> <a class="active" href="#.">M</a> <a
                                                    href="#.">L</a> <a href="#.">XL</a> </div>
                                        </div>
                                    </div>
                                    <!-- Compare Wishlist -->
                                    <ul class="cmp-list">
                                        <li><a href="#."><i class="fa fa-heart"></i> Add to Wishlist</a></li>
                                        <li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>
                                        <li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>
                                    </ul> --}}
                                    <!-- Quinty -->
                                    <div class="quinty">
                                        <input type="number" value="1" min="1" id="change-qty">
                                    </div>
                                    <a href="#" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Add
                                        to Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Details Tab Section-->
                        <div class="item-tabs-sec">
                            <!-- Nav tabs -->
                            <ul class="nav" role="tablist">
                                <li role="presentation" class="active"><a href="#pro-detil" role="tab"
                                        data-toggle="tab">Product Details</a></li>
                                {{-- <li role="presentation"><a href="#cus-rev" role="tab" data-toggle="tab">Customer
                                        Reviews</a></li>
                                <li role="presentation"><a href="#ship" role="tab" data-toggle="tab">Shipping &
                                        Payment</a></li> --}}
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                   {!! $product->description !!}
                                </div>
                                {{-- <div role="tabpanel" class="tab-pane fade" id="cus-rev"></div>
                                <div role="tabpanel" class="tab-pane fade" id="ship"></div> --}}
                            </div>
                        </div>
                    </div>
                    @if ($product_related->count() > 0)
                    <!-- Related Products -->
                    <section class="padding-top-30 padding-bottom-0">
                        <!-- heading -->
                        <div class="heading">
                            <h2>Related Products</h2>
                            <hr>
                        </div>
                        <!-- Items Slider -->
                        <div class="item-slide-4 with-nav">
                            @foreach ($product_related as $product)
                                @include('public.product.partials.product')
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if ($product_recent->count() > 0)
    <!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
        <div class="container">
            <!-- heading -->
            <div class="heading">
                <h2>Your Recently Viewed Items</h2>
                <hr>
            </div>
            <!-- Items Slider -->
            <div class="item-slide-5 with-nav">
                @foreach ($product_recent as $product)
                @include('public.product.partials.product')
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
<!-- End Content -->
<form action="{{ route('cart.items.store') }}" method="post" id="formAddToCart2">
    @csrf
    <input type="hidden" name="product_id" id="product_id">
    <input type="hidden" name="qty" value="1">
</form>
@endsection
@push('scripts')
<!-- JavaScripts -->
<script src="{{ Theme::url('assets/product/js/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/vendors/wow.min.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/vendors/own-menu.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/vendors/jquery.sticky.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/vendors/owl.carousel.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ Theme::url('assets/product/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
<script type="text/javascript" src="{{ Theme::url('assets/product/rs-plugin/js/jquery.tp.min.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/main.js') }}"></script>
<script src="{{ Theme::url('assets/product/js/search.js') }}"></script>
<script src="js/vendors/jquery.nouislider.min.js"></script>
<script>
    $(document).ready(function(){
        $("#price-range").noUiSlider({
            range: {
                'min': [ 0 ],
                'max': [ {{ $price_max }} ]
            },
            start: [0, {{ $price_max }}],
            connect:true,
            serialization:{
                lower: [
                    $.Link({
                        target: $("#price-min")
                    })
                ],
                upper: [
                    $.Link({
                        target: $("#price-max")
                    })
                ],
                format: {
                    thousand: ',',
                    decimals: 0,
                    prefix: 'đ'

                }
            }
        });

        $('.cate-style-toggle').click(function(){
            $('.collapse-toggle').toggle();
        });
        $('#change-qty').on('change', function(){
            let qty = $(this).val();
            if(qty <= 0){
                qty = 1;
                $(this).val(1);
            }
            $('#qty').val(qty);
        });
        $('.btn-round').click(function(e){
            e.preventDefault();
            $('#formAddToCart').submit();
        });
        $('.cart-btn').click(function(e){
            e.preventDefault();
            const id = $(this).data('productid');
            $('#product_id').val(id);
            $('#formAddToCart2').submit();
        });
    })
</script>
@endpush
