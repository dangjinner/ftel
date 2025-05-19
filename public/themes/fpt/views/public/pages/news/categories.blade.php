@extends('public.layout')

@section('content')
<div class="slider__banner mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 slider__inner">
                <div class="slider_area slider-one">
                    <div class="slider_area slider-one">
                        <div class="single_slider">
                            <img src="{{v(theme::url('assets/images-jpeg/banner-truyen-hinh-fpt.jpg')) }}"
                                alt="Truyền hình FPT" class="img-fluid">
                        </div>
                        <div class="single_slider">
                            <img src="{{v(theme::url('assets/images-jpeg/banner-fsafe-fpt.jpg')) }}" alt="FPT Fsafe"
                                class="img-fluid">
                        </div>
                        <div class="single_slider">
                            <img src="{{ v(theme::url('assets/images-jpeg/banner-play-box-fpt.jpg')) }}"
                                alt="FPT Play Box" class="img-fluid">
                        </div>
                        <!-- Single Slider Start -->
                        <div class="single_slider">
                            <img src="{{ v(theme::url('assets/images-jpeg/banner-camera-fpt.jpg')) }}" alt="FPT Camera"
                                class="img-fluid">
                        </div>
                        <!-- Single Slider End -->
                        <div class="single_slider">
                            <img src="{{ v(theme::url('assets/images-jpeg/banner-internet-fpt.jpg')) }}"
                                alt="Internet FPT" class="img-fluid">
                        </div>
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
                            <li>Khuyến mãi</li>
                            <li>Internet FPT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="productservice shopserive productservice--1">
        <div class="container">
            <div class="col-lg-12 col-12">
                <div class="testimonial-carousel--1 slick-custom slick-custom-default nav-top">
                    <div class="single_testimonial text-center active">
                        <a class="productservice__img" href="{{ route('pages.saleInternet') }}">
                            <img src="{{ v(theme::url('assets/images/icon/internet fpt.png')) }}" alt=""
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="{{ route('pages.saleInternet') }}" alt="INTERNET FPT">INTERNET FPT</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="{{ route('pages.saleNetTv') }}">
                            <img src="{{ v(theme::url('assets/images/icon/tv fpt.png')) }}" alt="" class="img-fluid">
                        </a>
                        <p>
                            <a href="{{ route('pages.saleNetTv') }}" alt="TRUYỀN HÌNH FPT"> TRUYỀN HÌNH FPT </a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="{{ route('pages.comboInternet') }}">
                            <img src="{{ v(theme::url('assets/images/icon/combo net tv fpt.png')) }}" alt=""
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="{{ route('pages.comboInternet') }}" alt="Net + Truyền hình FPT"> COMBO INTERNET +
                                TRUYỀN HÌNH</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="{{ route('pages.cameraFpt') }}">
                            <img src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}" alt=""
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="{{ route('pages.cameraFpt') }}" alt="FPT CAMERA"> FPT CAMERA </a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="{{  route('pages.playBoxx')  }}">
                            <img src="{{ v(theme::url('assets/images/icon/fpt play box.png')) }}" alt=""
                                class="img-fluid">
                        </a>
                        <p>
                            <a href="{{  route('pages.playBoxx')  }}" alt="FPT PLAY BOX">FPT PLAY BOX</a>
                        </p>
                    </div>
                    <div class="single_testimonial text-center">
                        <a class="productservice__img" href="{{  route('pages.iHome')  }}">
                            <img src="{{ v(theme::url('assets/images/icon/home fpt.png')) }}" alt="FPT iHOME"
                                class="img-fluid" alt="" class="img-fluid">
                        </a>
                        <p>
                            <a href="{{  route('pages.iHome')  }}" alt="FPT PLAY BOX">FPT iHOME</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news news--1">
        <div class="container">
            <div class="row mt-20 mb-20">
                <div class="col-lg-12">
                    <div class="block-title block__orange">
                        <h2>
                            <span class="block__image">
                                <img src="{{ v(theme::url('assets/images/latest-news.png')) }}" alt="Tin mới nhất FPT">
                            </span>
                            TIN MỚI NHẤT
                        </h2>
                    </div>
                </div>
                <div class="col-lg-8 news__first col-md-6 col-sm-6">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/sp2-jpg.jfif')) }}" alt=""
                                    class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 news__first col-md-6 col-sm-6">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    FPT Telecom tặng lì xì cho Khách hàng đăng ký ví điện tử Foxpay
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    FPT Telecom xin gửi tặng những bao lì xì Tết Tân Sửu tới Khách hàng cài đặt và đăng
                                    ký mới tài khoản Ví điện tử Foxpay từ ngày 18/01/2021 đến hết ngày 08/02/2021...
                                </p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new1.png')) }}" alt="Tin tức FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    FPT Telecom tặng lì xì cho Khách hàng đăng ký ví điện tử Foxpay
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    FPT Telecom xin gửi tặng những bao lì xì Tết Tân Sửu tới Khách hàng cài đặt và đăng
                                    ký mới tài khoản Ví điện tử Foxpay từ ngày 18/01/2021 đến hết ngày 08/02/2021...
                                </p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new2.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10"><a href="#">
                                    Cơ hội trúng xe Vespa, iPhone 12 khi rủ bạn dùng Internet FPT</a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>Tổng giải thưởng của chương trình lên tới hơn nửa tỷ đồng, trong đó nhiều phần thưởng
                                    giá trị như xe Vespa, iPhone 12, smart TV…sẽ dành cho bất kỳ Khách hàng nào của FPT
                                    khi rủ bạn dùng Internet/Truyền hình của FPT.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new3.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    Danh sách Khách hàng trúng thưởng “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>FPT Telecom trân trọng công bố Danh sách Khách hàng quay số trúng thưởng chương trình
                                    “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2 đối với những mã dự thưởng tham gia từ
                                    30/10/2020 - 30/11/2020.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new1.png')) }}" alt="Tin tức FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    FPT Telecom tặng lì xì cho Khách hàng đăng ký ví điện tử Foxpay
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    FPT Telecom xin gửi tặng những bao lì xì Tết Tân Sửu tới Khách hàng cài đặt và đăng
                                    ký mới tài khoản Ví điện tử Foxpay từ ngày 18/01/2021 đến hết ngày 08/02/2021...
                                </p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new2.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10"><a href="#">
                                    Cơ hội trúng xe Vespa, iPhone 12 khi rủ bạn dùng Internet FPT</a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>Tổng giải thưởng của chương trình lên tới hơn nửa tỷ đồng, trong đó nhiều phần thưởng
                                    giá trị như xe Vespa, iPhone 12, smart TV…sẽ dành cho bất kỳ Khách hàng nào của FPT
                                    khi rủ bạn dùng Internet/Truyền hình của FPT.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new3.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    Danh sách Khách hàng trúng thưởng “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>FPT Telecom trân trọng công bố Danh sách Khách hàng quay số trúng thưởng chương trình
                                    “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2 đối với những mã dự thưởng tham gia từ
                                    30/10/2020 - 30/11/2020.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new1.png')) }}" alt="Tin tức FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    FPT Telecom tặng lì xì cho Khách hàng đăng ký ví điện tử Foxpay
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>
                                    FPT Telecom xin gửi tặng những bao lì xì Tết Tân Sửu tới Khách hàng cài đặt và đăng
                                    ký mới tài khoản Ví điện tử Foxpay từ ngày 18/01/2021 đến hết ngày 08/02/2021...
                                </p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new2.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10"><a href="#">
                                    Cơ hội trúng xe Vespa, iPhone 12 khi rủ bạn dùng Internet FPT</a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>Tổng giải thưởng của chương trình lên tới hơn nửa tỷ đồng, trong đó nhiều phần thưởng
                                    giá trị như xe Vespa, iPhone 12, smart TV…sẽ dành cho bất kỳ Khách hàng nào của FPT
                                    khi rủ bạn dùng Internet/Truyền hình của FPT.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                    <!-- Single Blog start -->
                    <div class="single-blog">
                        <div class="blog-image mb-10">
                            <a href="#"><img src="{{ v(theme::url('assets/images/new3.png')) }}" alt="Tin mới nhất FPT"
                                    class="img-fluid"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news__title mb-10">
                                <a href="#">
                                    Danh sách Khách hàng trúng thưởng “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2
                                </a>
                            </h5>
                            <ul class="meta">
                                <li><a href="#"><span class="news__category">Dịch vụ Online</span>,18-01-2021 15:00</a>
                                </li>
                            </ul>
                            <div class="desc">
                                <p>FPT Telecom trân trọng công bố Danh sách Khách hàng quay số trúng thưởng chương trình
                                    “Rủ bạn thêm vui - Tăng phần ưu đãi” đợt 2 đối với những mã dự thưởng tham gia từ
                                    30/10/2020 - 30/11/2020.</p>
                            </div>
                            <div><a href="#" class="news__more"> Tìm hiểu</a></div>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
            </div>
            <div class="toolbar-shop toolbar-bottom">
                <div class="pagination">
                    <ul>
                        <li class="previous"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="current">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">..</a></li>
                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endsection
