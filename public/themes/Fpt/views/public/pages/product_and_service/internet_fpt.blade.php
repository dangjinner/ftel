@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="" class="img-fluid">
    <div class="bg-menu-banner">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.internetFpt') }}"  class="active">Internet FPT</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.maxyTv') }}">Truyền hình FPT</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.onlineService') }}">
               Dịch vụ Online</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.smartHome') }}">
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
                   <li>Internet Fpt</li>
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
               <a class="productservice__img" href="{{ route('pages.individualFiber') }}">
               <img src="{{ v(theme::url('assets/images/icon/cap quang ca nhan fpt.png')) }}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.individualFiber') }}" alt="Cáp quang Cá nhân">Cáp quang Cá nhân</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="{{ route('pages.enterpriseFiber') }}">
               <img src="{{ v(theme::url('assets/images/icon/cap quang doanh nghiep fpt.png')) }}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.enterpriseFiber') }}" alt="Cáp quang doanh nghiệp">Cáp quang doanh nghiệp</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="{{ route('pages.netTv') }}">
               <img src="{{ v(theme::url('assets/images/icon/combo net tv fpt.png')) }}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.netTv') }}" alt="Net + Truyền hình FPT">Net + Truyền hình FPT</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="#">
               <img src="{{ v(theme::url('assets/images/icon/iot fpt.png')) }}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="#" alt="SOC 1Gbps">SOC 1Gbps</a>
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
 <div class="pricing pricing--shop" id="internet-fpt">
    <div class="container">
      <div class="row">
         <div class="pricing__title">
            <img alt="Combo Internet &amp; Truyền hình FPT" src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}">
            Gói cước internet cá nhân
         </div>
      </div>
       <div class="pricing--4 slick-custom slick-custom-default">
          <div class="pricing__col blue">
             <div class="pricing__inner">
                <div class="top">
                   <div>
                      <div class="img-combo"><span ><img alt="" src="{{ v(theme::url('assets/images/combo/goi cap quang fpt super 25mb.png')) }}"></span></div>
                      <div class="price">
                         <h4>190.000</h4>
                         <span>vnđ/ tháng</span>
                         <p><b>25</b>Mbps</p>
                      </div>
                   </div>
                </div>
                <div class="middle">
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/b-person.png')) }}"></span>
                      <ul>
                         <li>Phù hợp với cá nhân, hộ gia đình</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/b-cloud.png')) }}"></span>
                      <ul>
                         <li>Download/ Upload 25&nbsp;Mbps</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/b-dola.png')) }}"></span>
                      <ul>
                         <li>Miễn phí lắp đặt</li>
                         <li>Trang bị Modem Wifi miễn phí  </li>
                         <li>Trả trước 6 tháng + 1 tháng</li>
                         <li>Trả trước 12 tháng + 2 tháng</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/b-setting.png')) }}"></span>
                      <ul>
                         <li>Lắp đặt nhanh chóng trong vòng 48h</li>
                         <li>Hỗ trợ kỹ thuật 24/7</li>
                      </ul>
                   </div>
                </div>
                <div class="bottom">
                   <p>Mức giá trên đã bao gồm VAT.</p>
                   <a href="{{ route('pages.register') }}">Đăng ký ngay</a>
                </div>
             </div>
          </div>
          <div class="pricing__col oranges">
             <div class="pricing__inner">
                <div class="top">
                   <div>
                      <div class="img-combo"><span><img alt="" src="{{ v(theme::url('assets/images/combo/goi cap quang fpt super 45mb.png')) }}"></span></div>
                      <div class="price">
                         <h4>200.000</h4>
                         <span>vnđ/ tháng</span>
                         <p><b>45</b>Mbps</p>
                      </div>
                   </div>
                </div>
                <div class="middle">
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/o-person.png')) }}"></span>
                      <ul>
                         <li>Phù hợp với cá nhân, hộ gia đình</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/o-cloud.png')) }}"></span>
                      <ul>
                         <li>Download/ Upload 45 Mbps</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/o-dola.png')) }}"></span>
                      <ul>
                         <li>Miễn phí lắp đặt</li>
                         <li>Trang bị Modem Wifi miễn phí  </li>
                         <li>Trả trước 6 tháng + 1 tháng</li>
                         <li>Trả trước 12 tháng + 2 tháng</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/o-setting.png')) }}"></span>
                      <ul>
                         <li>Lắp đặt nhanh chóng trong vòng 48h</li>
                         <li>Hỗ trợ kỹ thuật 24/7</li>
                      </ul>
                   </div>
                </div>
                <div class="bottom">
                   <p>Mức giá trên đã bao gồm VAT.</p>
                   <a href="{{ route('pages.register') }}">Đăng ký ngay</a>
                </div>
             </div>
          </div>
          <div class="pricing__col green">
             <div class="pricing__inner">
                <div class="top">
                   <div>
                      <div class="img-combo">
                         <span><img alt="" src="{{ v(theme::url('assets/images/combo/goi cap quang fpt super 60mb.png')) }}"></span>
                      </div>
                      <div class="price">
                         <h4>255.000</h4>
                         <span>vnđ/ tháng</span>
                         <p><b>60</b>Mbps</p>
                      </div>
                   </div>
                </div>
                <div class="middle">
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/g-person.png')) }}"></span>
                      <ul>
                         <li>Phù hợp với cá nhân, hộ gia đình</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/g-cloud.png')) }}"></span>
                      <ul>
                         <li>Download/ Upload 60 Mbps</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/g-dola.png')) }}"></span>
                      <ul>
                         <li>Miễn phí lắp đặt</li>
                         <li>Trang bị Modem Wifi miễn phí  </li>
                         <li>Trả trước 6 tháng + 1 tháng</li>
                         <li>Trả trước 12 tháng + 2 tháng</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/g-setting.png')) }}"></span>
                      <ul>
                         <li>Lắp đặt nhanh chóng trong vòng 48h</li>
                         <li>Hỗ trợ kỹ thuật 24/7</li>
                      </ul>
                   </div>
                </div>
                <div class="bottom">
                   <p>Mức giá trên đã bao gồm VAT.</p>
                   <a href="{{ route('pages.register') }}">Đăng ký ngay</a>
                </div>
             </div>
          </div>
          <div class="pricing__col purple" >
             <div class="pricing__inner">
                <div class="top">
                   <div>
                      <div class="img-combo"><span ><img alt="" src="{{ v(theme::url('assets/images/combo/goi cap quang fpt super 80mb.png')) }}"></span></div>
                      <div class="price">
                         <h4>320.000</h4>
                         <span>vnđ/ tháng</span>
                         <p><b>80</b>Mbps</p>
                      </div>
                   </div>
                </div>
                <div class="middle" >
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/p-person.png')) }}"></span>
                      <ul>
                         <li>Phù hợp với cá nhân, hộ gia đình</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/p-cloud.png')) }}"></span>
                      <ul>
                         <li>Download/ Upload 80 Mbps</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/p-dola.png')) }}"></span>
                      <ul>
                         <li>Miễn phí lắp đặt</li>
                         <li>Trang bị Modem Wifi miễn phí  </li>
                         <li>Trả trước 6 tháng + 1 tháng</li>
                         <li>Trả trước 12 tháng + 2 tháng</li>
                      </ul>
                   </div>
                   <div class="row-content">
                      <span><img alt="" src="{{ v(theme::url('assets/images/icon/p-setting.png')) }}"></span>
                      <ul>
                         <li>Lắp đặt nhanh chóng trong vòng 48h</li>
                         <li>Hỗ trợ kỹ thuật 24/7</li>
                      </ul>
                   </div>
                </div>
                <div class="bottom">
                   <p>
                      Mức giá trên đã bao gồm VAT.
                   </p>
                   <a href="{{ route('pages.register') }}">Đăng ký ngay</a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <section class="productservice productservice--1">
    <div class="container">
       <div class="col-lg-12 col-12">
          <div class="block-title block__orange">
             <h2>
                <span class="block__image">
                <img alt="" src="{{ v(theme::url('assets/images/icon/introduct fpt.png')) }}">
                </span>
                GIỚI THIỆU
             </h2>
          </div>
          <p>Đáp ứng nhu cầu giải trí đa dạng của cả gia đình, combo dịch vụ Internet và Truyền hình FPT không chỉ mang đến sự thuận tiện tối đa cho quý khách hàng trong quá trình lắp đặt, sử dụng và thanh toán cước, mà còn giúp tiết kiệm chi phí, mang lại sự tối ưu so với việc chỉ đăng ký một trong hai dịch vụ. FPT Telecom cung cấp các gói cước combo dịch vụ Internet và Truyền hình tương tác giá chỉ từ 205.000Đ/tháng (đã bao gồm VAT).</p>
       </div>

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
          <div class="col-lg-6 feature__col">
             <div class="feature__icon">
                <img alt="FTTH-f1.png" src="{{ v(theme::url('assets/images/icon/FTTH-f1 fpt.png')) }}">
             </div>
             <div class="feature__text">Tốc độ truy cập Internet cao, lên đến 1Gigabit/giây (1Gbps)</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f5.png" src="{{ v(theme::url('assets/images/icon/FTTH-f5 fpt.png')) }}"></div>
             <div class="feature__text">Đăng ký dễ dàng, tiện lợi qua tổng đài, trên website trực tuyến hoặc tại hệ thống các văn phòng giao dịch của FPT Telecom trải dài trên toàn quốc</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f2.png" src="{{ v(theme::url('assets/images/icon/FTTH-f2 fpt.png')) }}"></div>
             <div class="feature__text">Chất lượng tín hiệu ổn định, không bị ảnh hưởng bởi thời tiết, chiều dài cáp…</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f6.png" src="{{ v(theme::url('assets/images/icon/FTTH-f6 fpt.png')) }}"></div>
             <div class="feature__text">Thời gian lắp đặt dịch vụ nhanh chóng, tối đa là 3-5 ngày</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f3.png" src="{{ v(theme::url('assets/images/icon/FTTH-f3 fpt.png')) }}"></div>
             <div class="feature__text">Thiết bị an toàn (không sợ sét đánh lan truyền trên đường dây)</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f7.png" src="{{ v(theme::url('assets/images/icon/FTTH-f7 fpt.png')) }}"></div>
             <div class="feature__text">Quản lý cước rõ ràng</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f4.png" src="{{ v(theme::url('assets/images/icon/FTTH-f4 fpt.png')) }}"></div>
             <div class="feature__text">Đáp ứng hiệu quả cho các ứng dụng Công nghệ thông tin hiện đại như: Hosting Server riêng, VPN (mạng riêng ảo), Truyền dữ divệu, Game Ondivne, IPTV (truyền hình tương tác), VoD (xem phim theo yêu cầu), Video Conferrence (hội nghị truyền hình), IP Camera,…</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f8.png" src="{{ v(theme::url('assets/images/icon/FTTH-f8 fpt.png')) }}"></div>
             <div class="feature__text">Chăm sóc và hỗ trợ giải đáp khách hàng 24/7</div>
          </div>
          <div class="col-lg-6 feature__col">
             <div class="feature__icon"><img alt="FTTH-f9.png" src="{{ v(theme::url('assets/images/icon/FTTH-f9 fpt.png')) }}"></div>
             <div class="feature__text">Dễ dàng nâng cấp băng thông mà không cần kéo cáp mới</div>
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
