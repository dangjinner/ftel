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
@endpush
@section('content')

<!-- Content -->
<div id="content">

    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">

                <!-- Step 1 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>
                <!-- Step 2 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Billing Information</h6>
                    </div>
                </li>

                 <!-- Step 3 -->
                 <li class="col-sm-3 current">
                    <div class="media-left"> <i class="flaticon-business"></i> </div>
                    <div class="media-body"> <span>Step 3</span>
                        <h6>Payment Methods</h6>
                    </div>
                </li>

                <!-- Step 4 -->
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 4</span>
                        <h6>Confirmation</h6>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Payout Method -->
    <section class="padding-bottom-60">
        <div class="container">
            <!-- Payout Method -->
            <div class="pay-method">
                <div class="row">
                    <div class="col-md-6">

                        <!-- Your Card -->
                        <div class="heading">
                            <h2>Your Card</h2>
                            <hr>
                        </div>
                        <img src="images/card-icon.png" alt="">
                    </div>
                    <div class="col-md-6">

                        <!-- Your information -->
                        <div class="heading">
                            <h2>Your information</h2>
                            <hr>
                        </div>
                        <form>
                            <div class="row">

                                <!-- Cardholder Name -->
                                <div class="col-sm-6">
                                    <label> Cardholder Name
                                        <input class="form-control" type="text">
                                    </label>
                                </div>

                                <!-- Card Number -->
                                <div class="col-sm-6">
                                    <label> Card Number
                                        <input class="form-control" type="text">
                                    </label>
                                </div>

                                <!-- Card Number -->
                                <div class="col-sm-7">
                                    <label> Expire Date </label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="selectpicker">
                                                <option> MM</option>
                                                <option> 01</option>
                                                <option> 02</option>
                                                <option> 03</option>
                                                <option> 04</option>
                                                <option> 05</option>
                                                <option> 06</option>
                                                <option> 07</option>
                                                <option> 08</option>
                                                <option> 09</option>
                                                <option> 10</option>
                                                <option> 11</option>
                                                <option> 12</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="selectpicker">
                                                <option> YYYY</option>
                                                <option> 2001</option>
                                                <option> 2002</option>
                                                <option> 2003</option>
                                                <option> 2004</option>
                                                <option> 2005</option>
                                                <option> 2006</option>
                                                <option> 2007</option>
                                                <option> 2008</option>
                                                <option> 2009</option>
                                                <option> 2010</option>
                                                <option> 2011</option>
                                                <option> 2012</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label> CVV
                                        <input class="form-control" type="text">
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Shopping Cart</a> <a href="#."
                    class="btn-round">Go Delivery Methods</a> </div>
        </div>
    </section>
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
    });
</script>
@endpush
