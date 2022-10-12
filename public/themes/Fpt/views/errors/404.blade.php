@extends('public.layout')

@section('title', trans('fpt::404.404'))

@section('content')
    <section class="error-page-wrap">
        <div class="container">
            <div class="row error-page">
                <div class="col-xl-12 col-lg-12 col-md-12 error-page-left" style="margin-top: 50px;">
                    <h1 class="section-title">Oops! Nội dung không tìm thấy.</h1>

                    <p>Xin lỗi, nội dung bạn vừa truy cập hiện không tìm thấy, bạn có thể quay về <a href="{{ route('home') }}" class="btn btn-primary btn-back-to-home">Trang chủ</a> để tiếp tục
                     </p>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 error-page-right">

                </div>
            </div>
        </div>
    </section>
@endsection