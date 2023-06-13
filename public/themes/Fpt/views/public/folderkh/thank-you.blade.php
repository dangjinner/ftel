@extends('public.layout')
@section('css')
<style>
    @media (max-width: 767px) {
        .progress li:nth-child(2) {
            background: #f37021;
            color: #f37021;
            width: 70%;
            margin-top: 5px;
            display: flex;
        }
    }

    @media(min-width:768px) and (max-width:1024px) {
        .progress li:nth-child(2) {
            background: #f37021;
            width: 70%;
            margin-bottom: 5px;
        }
    }
</style>
@endsection
@section('content')
<div class="header-banner">
    <img src="{{ v(Theme::url('assets/images/dang ky online fpt.png')) }}" alt="">
</div>
<main class="col-md-8 col-md-offset-2 center">
    <section class="steps">
        <ul class="progress">
            <li class="active"><i class="fas fa-building"></i><a href="#">Kiểm tra hạ tầng</a></li>
            <li class="active"><i class="fas fa-file-signature white"></i><a class="white" href="#">Hoàn tất đăng ký</a>
            </li>
        </ul>
    </section>

    <section class="container">
        <div class="jumbotron text-center">
            <h1 class="display-3">Thank You!</h1>
            <i class="fa fa-check size-xl"></i>
            <p class="lead"><strong>Bạn đã đăng ký thành công. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất có
                    thể.<br> Thank you who have used the services of <a href="/"
                        style="color: #034ea2;"> FPT Telecom!</a></strong> </p>
            <hr>
            <p>
                Hotline: <a href="tel:{{ setting('fpt_hotline') }}">{{ setting('fpt_hotline') }}</a> - <a href="/">Back to
                    Home</a>
            </p>

            <p class="lead" style="margin-top: 10px;">
                <a class="btn btn-primary btn-sm" href="/" role="button"><i
                        class="fa fa-home"></i></a>
            </p>
        </div>
    </section>
</main>
@endsection
