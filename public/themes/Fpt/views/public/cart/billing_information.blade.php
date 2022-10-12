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
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>

                <!-- Step 2 -->
                <li class="col-sm-3 current">
                    <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Billing Information</h6>
                    </div>
                </li>

                <!-- Step 3 -->
                <li class="col-sm-3">
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
                    <div class="col-md-12">
                        <!-- Your information -->
                        <div class="heading">
                            <h2>Your information</h2>
                            <hr>
                        </div>
                        <form>
                            <div class="row">

                                <!-- Name -->
                                <div class="col-sm-6">
                                    <label> Họ và tên
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    </label>
                                    @if ($errors->first('name'))
                                    <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>

                                <!-- Phone -->
                                <div class="col-sm-6">
                                    <label> Số điện thoại
                                        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                    </label>
                                    @if ($errors->first('phone'))
                                    <span class="help-block text-danger">{!! $errors->first('phone') !!}</span>
                                    @endif
                                </div>

                                <!-- Email -->
                                <div class="col-sm-12">
                                    <label> Email
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email') }}">
                                    </label>
                                    @if ($errors->first('email'))
                                    <span class="help-block text-danger">{!! $errors->first('email') !!}</span>
                                    @endif
                                </div>

                                <!-- Message -->
                                <div class="col-sm-12">
                                    <label> Email
                                        <textarea class="form-control" type="text" name="message"
                                            value="{{ old('message') }}"></textarea>
                                    </label>
                                    @if ($errors->first('message'))
                                    <span class="help-block text-danger">{!! $errors->first('message') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="pro-btn"> <a href="#." class="btn-round btn-light">Back to Payment</a> <a href="#."
                    class="btn-round">Go Confirmation</a> </div>
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
