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

    .card {
        position: relative;
        margin-bottom: 30px;
        border: 0;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        letter-spacing: .5px;
        border-radius: 8px;
        -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
        box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
    }

    .card .card-header {
        background-color: #fff;
        border-bottom: none;
        padding: 24px;
        border-bottom: 1px solid #f6f7fb;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card .card-body {
        padding: 30px;
        background-color: transparent;
        positiosn: relative;
    }

    .btn-primary,
    .btn-primary.disabled,
    .btn-primary:disabled {
        background-color: #4466f2 !important;
        border-color: #4466f2 !important
    }
    .coupon_wrapper{
        display: none;
        justify-content: space-between;
    }
    .coupon_wrapper.show{
        display: flex !important;
        justify-content: space-between;
    }
    .promo .g-totel h5{
        display: flex;
        justify-content: space-between;
    }
</style>
@endpush
@section('content')
<!-- Content -->
<div id="content">
    @if ($cartItems->items()->count() > 0)
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">

                <!-- Step 1 -->
                <li class="col-sm-3 current">
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

    <!-- Shopping Cart -->
    <section class="shopping-cart padding-bottom-60">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Tổng tiền</th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems->items() as $item)
                    <!-- Item Cart -->
                    <tr>
                        <td>
                            <div class="media">
                                <div class="media-left"> <a href="{{ route('product.shop.single', ['slug' => $item->product->slug]) }}">
                                    <img class="img-responsive"
                                            src="{{ $item->product->base_image->path }}" alt="{{ $item->product->base_image->name }}"> </a> </div>
                                <div class="media-body">
                                    <p>{{ $item->product->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-center padding-top-60">{{ $item->product->selling_price->format() }}</td>
                        <td class="text-center">
                            <!-- Quinty -->
                            <div class="quinty padding-top-20">
                                <input type="number" value="{{ $item->qty }}" min="1" class="qty" data-itemid={{ $item->id }}>
                            </div>
                        </td>
                        <td class="text-center padding-top-60 total-item-{{$item->id}}">{{ $item->total()->format() }}</td>
                        <td class="text-center padding-top-60">
                            <form action="{{ route('cart.items.destroy', ['cartItemId' => $item->id]) }}" method="POST">
                                @csrf
                                <input type="text" name="_method" value="DELETE" hidden>
                                <a href="javascript:{}" onclick="$(this).parent().submit()" class="remove-cart-item">
                                    <i class="fa fa-close"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Promotion -->
            <div class="promo" style="display: flex; justify-content: space-between;">
                <div class="coupen">
                    <label> Mã khuyến mãi
                        <input type="text" placeholder="Your code here" class="coupon">
                        <button type="submit" id="aplly-coupon"><i class="fa fa-arrow-circle-right"></i></button>
                    </label>
                    <p class="alert_coupon_message"></p>
                </div>

                <!-- Grand total -->
                <div class="g-totel">
                    <h5>Tạm tính: <span class="subtotal">{{ $cartItems->subTotal()->format() }}</span></h5>
                    @if ($cartItems->hasCoupon())
                    <div class="coupon_wrapper show">
                        <p style="margin: 0;">Mã khuyễn mãi :
                            <br>
                            <span class="coupon_name">({{ $cartItems->coupon()->code() }})</span>
                        </p>
                        <span class="coupon_value">{{ $cartItems->coupon()->value()->format() }}</span>
                    </div>
                    @else
                    <div class="coupon_wrapper">
                        <p style="margin: 0;">Mã khuyễn mãi :
                            <br>
                            <span class="coupon_name"></span>
                        </p>
                        <span class="coupon_value"></span>
                    </div>
                    @endif
                    <h5>Tổng cộng: <span class="total">{{ $cartItems->total()->format() }}</span></h5>
                </div>
            </div>

            <!-- Button -->
            <div class="pro-btn">
                <a href="{{ route('product.shop') }}" class="btn-round btn-light">Continue Shopping</a>
                <a href="{{ route('cart.billing_information') }}" class="btn-round">Go Billing Information</a> </div>
        </div>
    </section>
    @else
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                            <h3><strong>Your Cart is Empty</strong></h3>
                            <h4>Add something to make me happy :)</h4> <a href="{{ route('product.shop') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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
        $('.qty').on('change', function(){
            const id = $(this).data('itemid');
            let qty = $(this).val();
            if(qty <= 0){
                qty = 1;
                $(this).val(1);
            }
            const url = route('cart.items.update', {
                'cartItemId': id
            })
            $.ajax({
                url: url,
                method: 'PUT',
                data: {
                    qty,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response){
                    console.log(response);
                    $(`.total-item-${id}`).text(response.items[id].total.formatted);
                    $('.subtotal').text(response.subTotal.formatted);
                    $('.total').text(response.total.formatted);
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
        $('#aplly-coupon').click(function(e){
            e.preventDefault();
            const url = route('cart.coupon.store');
            const coupon = $('.coupon').val();

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    coupon,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response){
                    // console.log(response.coupon);
                    $('.alert_coupon_message').text('Áp dụng mã giảm giá thành công!');
                    $('.alert_coupon_message').fadeIn();
                    setTimeout(() => {
                        $('.alert_coupon_message').fadeOut();
                    }, 3000);
                    $('#coupon-value').val('');
                    $('.coupon_wrapper').css('display', 'flex');
                    $('.coupon_name').text(`(${response.coupon.code})`);
                    $('.coupon_value').text(`${response.coupon.value.formatted}`);
                    $('.total').text(response.total.formatted);
                    $('.coupon').val('');
                },
                error: function(error){
                    // console.log(error.responseJSON.message);
                    $('.alert_coupon_message').text(error.responseJSON.message);
                    $('.alert_coupon_message').fadeIn();
                    setTimeout(() => {
                        $('.alert_coupon_message').fadeOut();
                    }, 3000);
                }
            });
        });
    })
</script>
@endpush
