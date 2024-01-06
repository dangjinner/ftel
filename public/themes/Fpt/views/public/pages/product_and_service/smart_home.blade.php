@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/banner/iot-fpt.png'))}}" alt="IOT FPT" class="img-fluid">
    <div class="bg-menu-banner">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.internetFpt') }}">Internet FPT</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.maxyTv') }}">Truyền hình FPT</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.onlineService') }}">
               Dịch vụ Online</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.smartHome') }}" class="active">
               Smart Home</a>
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
                   <li>Sản phẩm dịch vụ</li>
                   <li>Smart Home</li>
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
                <a class="productservice__img" href="{{ route('pages.fptCamera') }}">
                <img src="{{ v(theme::url('assets/images/icon/cap quang ca nhan fpt.png'))}}" alt="Cáp quang cá nhân FPT" class="img-fluid">
                </a>
                <p>
                   <a href="{{ route('pages.fptCamera') }}" alt="FPT Camera">FPT Camera</a>
                </p>
             </div>
             <div class="single_testimonial text-center">
                <a class="productservice__img" href="{{ route('pages.fptIhome') }}">
                <img src="{{ v(theme::url('assets/images/icon/cap quang doanh nghiep fpt.png'))}}" alt="Cáp quang doanh nghiệp FPT" class="img-fluid">
                </a>
                <p>
                   <a href="{{ route('pages.fptIhome') }}" alt="Cáp quang doanh nghiệp">FPT iHome</a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="productservice">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-12">
             <div class="block-title row block__orange">
                <h2>
                   <span class="block__image">
                   <img alt="Giới thiệu FPT" src="{{ v(theme::url('assets/images/icon/introduce fpt.png'))}}">
                   </span>
                   GIỚI THIỆU
                </h2>
             </div>
             <div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
                <p dir="ltr" style="text-align:justify;">FPT Camera là một sản phẩm công nghệ của Công ty cổ phần viễn thông FPT (FPT Telecom), được ra mắt thị trường Việt Nam vào năm 2019. Với mục tiêu phục vụ số lượng lớn khách hàng sử dụng hệ thống Camera an ninh, FPT Telecom đem tới một dịch vụ tiện lợi - thông minh, hỗ trợ giám sát an toàn và bảo mật thông tin.</p>
                <p dir="ltr" style="text-align:justify;">Ưu điểm chính của FPT Camera là <strong>ổn định về tín hiệu, chất lượng hình ảnh cao, kết nối với nhiều thiết bị<span style="color:#000000;"> di động, </span><a href="#"><span style="color:#000000;">sử dụng lưu trữ Cloud</span></a></strong>. Bên cạnh đó, khách hàng luôn luôn được FPT đồng hành cùng quá trình sử dụng về <strong>bảo hành, bảo trì, hỗ trợ trực tuyến 24/7</strong>.</p>
                <p style="text-align:justify;">Hệ thống FPT Camera sẽ được tích hợp thêm nhiều chức năng cải tiến thông minh, mang tính đột phá về công nghệ do chính đội ngũ FPT Telecom phát triển.</p>
             </div>
          </div>
       </div>
    </div>
 </section>

 <section class="quality pricing" id="fpt-camera">
    <div class="container">
       <div class="row">
          <div class="pricing__title">
             <img alt="GÓI CƯỚC CAMERA FPT" src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}">
             GÓI CƯỚC CAMERA FPT
          </div>
       </div>
       <ul class="nav nav-tabs" >
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
                <div class="col-xs-6 col-lg-6 col-md-6 quality__left">
                   <div class="quality__inner">
                      <div class="quality__content row">
                         <div class="quality__img col-lg-4 col-sm-4">
                            <img src="{{ v(theme::url('assets/images/anh1.png'))}}" alt="FPT ngoài trời">
                         </div>
                         <div class="quality__text col-lg-8 col-sm-8">
                            Chất lượng hình ảnh sắc nét Full HD 1080p<br>
                            Kháng nước, kháng bụi IP66<br>
                            Hiện thị màu trong điều kiện ánh sáng yếu
                         </div>
                      </div>
                      <div class="row quality__camera">
                         <div class="col-6">
                            <div class="font-weight-bold quality__text">Camera ngoài trời</div>
                         </div>
                         <div class="col-6">
                            <a href="#">
                            Xem chi tiết
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 quality__right">
                   <div class="quality__inner">
                      <div class="quality__content row">
                         <div class="quality__img col-lg-4 col-sm-4">
                            <img src="{{ v(theme::url('assets/images/anh2.png'))}}" alt="Camera trong nhà">
                         </div>
                         <div class="quality__text col-lg-8 col-sm-8">
                            Chất lượng hình ảnh sắc nét Full HD 1080p<br>
                            Kết nối Lan hoặc Wifi<br>
                            Hiện thị màu trong điều kiện ánh sáng yếu
                         </div>
                      </div>
                      <div class="row quality__camera">
                         <div class="col-6">
                            <div class="font-weight-bold quality__text">Camera trong nhà</div>
                         </div>
                         <div class="col-6">
                            <a href="#">
                            Xem chi tiết
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="menu1">
             <div class="quality__card row">
                <div class="col-lg-4 col-sm-6">
                   <div class="quality__inner">
                      <div class="quality__header text-center px-3 pt-4 pb-0">
                         <h4>Gói lưu trữ 1 ngày</h4>
                         <p class="quality__price"><span class="text-bold">44.000</span></p>
                         <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                      </div>
                      <div class="quality__body">
                         <ul>
                            <li>Lưu trữ &amp; xem lại: 01 ngày trước</li>
                            <li>Video chất lượng: HD - 1080p</li>
                            <li>1+2 Tài khoản sử dụng</li>
                            <li>Cảnh báo thông minh</li>
                            <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
                         </ul>
                      </div>
                      <div class="quality__footer">
                         <a href="#">
                         Chi tiết
                         </a>
                      </div>
                   </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                   <div class="quality__inner">
                      <div class="quality__logo">
                         <img alt="hot" src="{{ v(theme::url('assets/images/icon/tick hot fpt.png'))}}">
                      </div>
                      <div class="quality__star">
                         <img alt="star" src="{{ v(theme::url('assets/images/icon/star fpt.png'))}}">
                      </div>
                      <div class="quality__header text-center px-3 pt-4 pb-0">
                         <h4>Gói lưu trữ 3 ngày</h4>
                         <p class="quality__price"><span class="text-bold">66.000</span></p>
                         <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                      </div>
                      <div class="quality__body">
                         <ul>
                            <li>Lưu trữ &amp; xem lại: 01 ngày trước</li>
                            <li>Video chất lượng: HD - 1080p</li>
                            <li>1+6 Tài khoản sử dụng</li>
                            <li>Cảnh báo thông minh</li>
                            <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
                         </ul>
                      </div>
                      <div class="quality__footer">
                         <a href="#">
                         Chi tiết
                         </a>
                      </div>
                   </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                   <div class="quality__inner">
                      <div class="quality__header text-center px-3 pt-4 pb-0">
                         <h4>Gói lưu trữ 7 ngày</h4>
                         <p class="quality__price"><span class="text-bold">99.000</span></p>
                         <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                      </div>
                      <div class="quality__body">
                         <ul>
                            <li>Lưu trữ &amp; xem lại: 07 ngày trước</li>
                            <li>Video chất lượng: HD - 1080p</li>
                            <li>1+14 Tài khoản sử dụng</li>
                            <li>Cảnh báo thông minh</li>
                            <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
                         </ul>
                      </div>
                      <div class="quality__footer">
                         <a href="#">
                         Chi tiết
                         </a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
