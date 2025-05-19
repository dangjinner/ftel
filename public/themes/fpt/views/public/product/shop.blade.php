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
<!-- Content -->
<form action="{{ route('cart.items.store') }}" method="post" id="formAddToCart">
    @csrf
    <input type="hidden" name="product_id" id="product_id">
    <input type="hidden" name="qty" value="1">
</form>
<div id="content">

    <!-- Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-left"> <i class="flaticon-arrows"></i> </div>
                    <div class="media-body">
                        <h5>Money Return</h5>
                        <span>30 Days money return</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-left"> <i class="flaticon-operator"></i> </div>
                    <div class="media-body">
                        <h5>Support 24/7</h5>
                        <span>Hotline: (+100) 123 456 7890</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-left"> <i class="flaticon-business"></i> </div>
                    <div class="media-body">
                        <h5>Safe Payment</h5>
                        <span>Protect online payment</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- tab Section -->
    <section class="featur-tabs padding-top-60 padding-bottom-60">
        <div class="container">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-pills margin-bottom-40" role="tablist">
                <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab"
                        data-toggle="tab">Featured</a></li>
                {{-- <li role="presentation"><a href="#special" aria-controls="special" role="tab"
                        data-toggle="tab">Special</a></li>
                <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">Onsale</a>
                </li> --}}
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Featured -->
                <div role="tabpanel" class="tab-pane active fade in" id="featur">
                    <!-- Items Slider -->
                    <div class="item-slide-5 with-nav">
                        @foreach ($products as $product)
                        @include('public.product.partials.product')
                        @endforeach
                        {{-- <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive"
                                    src="{{ Theme::url('assets/product/images/item-img-1-2.jpg') }}" alt=""> <span
                            class="sale-tag">-25%</span>

                        <!-- Content -->
                        <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                            Slim Con 8GB</a>
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                            <span class="margin-left-10">5 Review(s)</span></p>
                        <div class="price">$350.00 <span>$200.00</span></div>
                        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-3.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-4.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-5.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-6.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                                Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-7.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div> --}}
                </div>
            </div>

            <!-- Special -->
            {{-- <div role="tabpanel" class="tab-pane fade" id="special">
                    <!-- Items Slider -->
                    <div class="item-col-5">

                        <!-- Product -->
                        <div class="product">
                            <article> <a href="./Product-Details.html"><img class="img-responsive"
                                        src="{{ Theme::url('assets/product/images/item-img-1-11.jpg') }}" alt=""> </a>
            <!-- Content -->
            <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7
                Perfect For Playing Game</a>
            <!-- Reviews -->
            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                <span class="margin-left-10">5 Review(s)</span></p>
            <div class="price">$350.00 </div>
            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
            </article>
        </div>

        <!-- Product -->
        <div class="product">
            <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-9.jpg') }}"
                    alt=""> <span class="sale-tag">-25%</span>

                <!-- Content -->
                <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                    Slim Con 8GB</a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                    <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">$350.00 <span>$200.00</span></div>
                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
            </article>
        </div>

        <!-- Product -->
        <div class="product">
            <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}"
                    alt="">
                <!-- Content -->
                <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                    Watch M26 Touch Bluetooh </a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                    <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">$350.00</div>
                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
            </article>
        </div>

        <!-- Product -->
        <div class="product">
            <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-7.jpg') }}"
                    alt=""> <span class="new-tag">New</span>

                <!-- Content -->
                <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                    Bluetooth Con Air Mouse</a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                    <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">$350.00</div>
                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
            </article>
        </div>

        <!-- Product -->
        <div class="product">
            <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-6.jpg') }}"
                    alt="">
                <!-- Content -->
                <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                    128GB full HD</a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                    <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">$350.00</div>
                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
            </article>
        </div>
</div>
</div> --}}

<!-- on sale -->
{{-- <div role="tabpanel" class="tab-pane fade" id="on-sal">
                    <!-- Items Slider -->
                    <div class="item-col-5">

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive"
                                    src="{{ Theme::url('assets/product/images/item-img-1-3.jpg') }}" alt="">
<!-- Content -->
<span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7
    Perfect For Playing Game</a>
<!-- Reviews -->
<p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
    <i class="fa fa-star-o"></i>
    <span class="margin-left-10">5 Review(s)</span></p>
<div class="price">$350.00 </div>
<a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
</article>
</div>

<!-- Product -->
<div class="product">
    <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-1.jpg') }}" alt=""> <span
            class="sale-tag">-25%</span>

        <!-- Content -->
        <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
            Slim Con 8GB</a>
        <!-- Reviews -->
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i> <i class="fa fa-star"></i>
            <span class="margin-left-10">5 Review(s)</span></p>
        <div class="price">$350.00 <span>$200.00</span></div>
        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
    </article>
</div>

<!-- Product -->
<div class="product">
    <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-2.jpg') }}" alt="">
        <!-- Content -->
        <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
            Watch M26 Touch Bluetooh </a>
        <!-- Reviews -->
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i> <i class="fa fa-star"></i>
            <span class="margin-left-10">5 Review(s)</span></p>
        <div class="price">$350.00</div>
        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
    </article>
</div>

<!-- Product -->
<div class="product">
    <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-5.jpg') }}" alt=""> <span
            class="new-tag">New</span>

        <!-- Content -->
        <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
            Bluetooth Con Air Mouse</a>
        <!-- Reviews -->
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i> <i class="fa fa-star"></i>
            <span class="margin-left-10">5 Review(s)</span></p>
        <div class="price">$350.00</div>
        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
    </article>
</div>

<!-- Product -->
<div class="product">
    <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-4.jpg') }}" alt="">
        <!-- Content -->
        <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
            128GB full HD</a>
        <!-- Reviews -->
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i> <i class="fa fa-star"></i>
            <span class="margin-left-10">5 Review(s)</span></p>
        <div class="price">$350.00</div>
        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
    </article>
</div>
</div>
</div> --}}
</div>
</div>
</section>

<!-- Top Selling Week -->
<section class="light-gry-bg padding-top-60 padding-bottom-30">
    <div class="container">

        <!-- heading -->
        <div class="heading">
            <h2>Top Selling of the Week</h2>
            <hr>
        </div>

        <!-- Items -->
        <div class="item-col-5">

            <!-- Product -->
            <div class="product col-2x">
                <div class="like-bnr">
                    <div class="position-center-center">
                        <h5>Smart Watch 2.0</h5>
                        <p>Space Gray Aluminum Case
                            with Black/Volt Real Sport Band <span>38mm | 42mm</span> </p>
                        <a href="#." class="btn-round">View Detail</a>
                    </div>
                </div>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-6.jpg') }}"
                        alt=""> <span class="sale-tag">-25%</span>

                    <!-- Content -->
                    <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con
                        8GB</a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00 <span>$200.00</span></div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-7.jpg') }}"
                        alt="">
                    <!-- Content -->
                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch
                        M26 Touch Bluetooh </a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}"
                        alt=""> <span class="new-tag">New</span>

                    <!-- Content -->
                    <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth
                        Con Air Mouse</a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-9.jpg') }}"
                        alt="">
                    <!-- Content -->
                    <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full
                        HD</a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-10.jpg') }}"
                        alt="">
                    <!-- Content -->
                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch
                        M26 Touch Bluetooh </a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-11.jpg') }}"
                        alt=""> <span class="new-tag">New</span>

                    <!-- Content -->
                    <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth
                        Con Air Mouse</a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-12.jpg') }}"
                        alt="">
                    <!-- Content -->
                    <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full
                        HD</a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>

            <!-- Product -->
            <div class="product">
                <article> <img class="img-responsive" src="{{ Theme::url('assets/product/images/item-img-1-13.jpg') }}"
                        alt="">
                    <!-- Content -->
                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch
                        M26 Touch Bluetooh </a>
                    <!-- Reviews -->
                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5
                            Review(s)</span></p>
                    <div class="price">$350.00</div>
                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Main Tabs Sec -->
<section class="main-tabs-sec padding-top-60 padding-bottom-0">
    <div class="container">
        <ul class="nav margin-bottom-40" role="tablist">
            <li role="presentation" class="active"><a href="#tv-au" aria-controls="featur" role="tab" data-toggle="tab">
                    <i class="flaticon-computer"></i> TV & Audios <span>236 item(s)</span></a>
            </li>
            <li role="presentation"><a href="#smart" aria-controls="special" role="tab" data-toggle="tab"><i
                        class="flaticon-smartphone"></i>Smartphones <span>150 item(s)</span></a></li>
            <li role="presentation"><a href="#deks-lap" aria-controls="on-sal" role="tab" data-toggle="tab"><i
                        class="flaticon-laptop"></i>Desk & Laptop <span>268 item(s)</span></a></li>
            <li role="presentation"><a href="#game-com" aria-controls="special" role="tab" data-toggle="tab"><i
                        class="flaticon-gamepad-1"></i>Game Console <span>79 item(s)</span></a></li>
            <li role="presentation"><a href="#watches" aria-controls="on-sal" role="tab" data-toggle="tab"><i
                        class="flaticon-computer-1"></i>Watches <span>105 item(s)</span></a></li>
            <li role="presentation"><a href="#access" aria-controls="on-sal" role="tab" data-toggle="tab"><i
                        class="flaticon-keyboard"></i>Accessories <span>816 item(s)</span></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- TV & Audios -->
            <div role="tabpanel" class="tab-pane active fade in" id="tv-au">

                <!-- Items -->
                <div class="item-slide-5 with-bullet no-nav">
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-1.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7
                                Perfect For Playing Game</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 </div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-2.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                                Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-3.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-4.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-5.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-6.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                                Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-7.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-9.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo
                                Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-10.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-11.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Smartphones -->
            <div role="tabpanel" class="tab-pane fade" id="smart">
                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-11.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-5.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-17.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-15.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Desk & Laptop -->
            <div role="tabpanel" class="tab-pane fade" id="deks-lap">

                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-2.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-3.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-4.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-13.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-15.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Game Console -->
            <div role="tabpanel" class="tab-pane fade" id="game-com">

                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-9.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-1.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-5.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-3.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-2.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Watches -->
            <div role="tabpanel" class="tab-pane fade" id="watches">

                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-8.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-9.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-17.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-16.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-12.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Accessories -->
            <div role="tabpanel" class="tab-pane fade" id="access">

                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-11.jpg') }}" alt=""> <span
                                class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-12.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-16.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart
                                Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-15.jpg') }}" alt=""> <span
                                class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico
                                Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive"
                                src="{{ Theme::url('assets/product/images/item-img-1-14.jpg') }}" alt="">
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7"
                                128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Selling Week -->
<section class="padding-top-60 padding-bottom-60">
    <div class="container">

        <!-- heading -->
        <div class="heading">
            <h2>From our Blog</h2>
            <hr>
        </div>
        <div id="blog-slide" class="with-nav">
            @foreach ($posts as $post)
            <!-- Blog Post -->
            <div class="blog-post">
                <article>
                    <img width="375" height="233" class="img-responsive" src="{{ $post->logo->path }}"
                        alt="{{ $post->name }}"> <span><i class="fa fa-bookmark-o"></i> {{ $post->date }}</span>
                    <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}" class="tittle">
                        {{ $post->name }}
                    </a>
                    <p> {!! subwords(strip_tags($post->content), 15) !!}... </p>
                    <a href="{{ route('pages.news.show', ['slug' => $post->slug]) }}">Readmore</a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Clients img -->
{{-- <section class="light-gry-bg clients-img">
        <div class="container">
            <ul>
                <li><img src="{{ Theme::url('assets/product/images/c-img-1.png')}} " alt=""></li>
<li><img src="{{ Theme::url('assets/product/images/c-img-2.png')}} " alt=""></li>
<li><img src="{{ Theme::url('assets/product/images/c-img-3.png')}} " alt=""></li>
<li><img src="{{ Theme::url('assets/product/images/c-img-4.png')}} " alt=""></li>
<li><img src="{{ Theme::url('assets/product/images/c-img-5.png')}} " alt=""></li>
</ul>
</div>
</section> --}}
</div>
<!-- End Content -->
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
<script>
    $(document).ready(function(){
        $('.cate-style-toggle').click(function(){
            $('.collapse-toggle').toggle();
        });
        $('.cart-btn').click(function(e){
            e.preventDefault();
            const id = $(this).data('productid');
            $('#product_id').val(id);
            $('#formAddToCart').submit();
        });
    })
</script>
@endpush
