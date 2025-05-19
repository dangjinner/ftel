<header>
    <div class="offcanvas_overlay">
    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="#"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="offcanvas_menu_logo">
                        <h1 style="display: none;"><?php echo isset($title) ? $title : ''; ?></h1>
                        <a href="{{ route('home') }}"><img alt="FPT Telecom"
                                src="{{ v(theme::url('assets/images/logo.png')) }}"></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <div class="offcanvas-search-container mb-40">
                            <form action="{{ route('pages.news') }}">
                                <div class="search_box">
                                    <input placeholder="Từ khóa ..." type="text"
                                        value="{{ request()->get('q') }}" name="q">
                                    <button type="submit">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                        <!-- Offcanvas Menu Start -->
                        <div class="offcanvas_menu_cover text-left">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a title="[CẬP NHẬT] CÁC SẢN PHẨM DỊCH VỤ MỚI NHẤT CỦA FPT TELECOM 2021"
                                        href="#">Sản phẩm dịch vụ</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a title="Các Gói Cước Internet FPT - FPT Telecom"
                                                href="#internet-fpt">Internet FPT</a>
                                            <ul class="sub-menu">
                                                <li><a href="#internet-fpt">Cáp quang Cá nhân</a>
                                                </li>
                                                <li><a href="#internet-fpt">Cáp quang doanh
                                                        nghiệp</a></li>
                                                <li><a href="#combo-internet-th">Net + Truyền hình FPT</a></li>
                                                <li><a href="#">SOC 1Gbps </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#truyen-hinh-fpt">Truyền hình FPT</a>
                                            <ul class="sub-menu">
                                                <li><a href="#truyen-hinh-fpt">Gói kênh MAXY</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Dịch vụ Online</a>
                                            <ul class="sub-menu">
                                                <li><a href="#fpt-play-box">FPT Play Box</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Smart Home</a>
                                            <ul class="sub-menu">
                                                <li><a href="#fpt-camera">FPT Camera</a></li>
                                                <li><a href="#fpt-ihome">FPT iHome</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('customer.register.online') }}">Khuyến mại</a>
                                    {{-- <a href="{{ route('customer.register.online') }}">Khuyến mại</a> --}}
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ thông tin</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('pages.support.faq') }}">Câu hỏi thường gặp</a>
                                                </li>
                                                <li><a href="{{ route('pages.support.fptTelevision') }}">Hướng dẫn sử
                                                        dụng</a></li>
                                                <li><a href="{{ route('pages.support.procedureGuide') }}">Hướng dẫn thủ
                                                        tục</a></li>
                                                <li><a href="{{ route('pages.support.privacyPolicy') }}">Điều khoản bảo
                                                        mật</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('pages.support.installationInstructions') }}">Hỗ trợ kỹ
                                                thuật</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('pages.support.installationInstructions') }}">Hướng
                                                        dẫn cài đặt</a></li>
                                                <li><a href="{{ route('pages.support.resovleProblem') }}">Xử lý sự
                                                        cố</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('pages.support.contact') }}">Liên hệ 24/7</a>
                                            <ul class="sub-menu">
                                                <!-- <li><a href="https://hi.fpt.vn/" target="_black">Hi FPT</a></li> -->
                                                <li><a href="{{ route('pages.support.contact') }}">Điểm giao dịch</a>
                                                </li>
                                                <li><a href="tel:{{ setting('fpt_hotline') }}">Tổng đài {{ setting('fpt_hotline') }}</a></li>
                                                <li><a href="https://www.facebook.com/fpttelecom.net.vn"
                                                        target="_black">Fanpage</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Phản hồi khách hàng</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Góp ý</a></li>
                                                <li><a href="#">Khảo sát</a></li>
                                                <li><a href="#">Đánh giá về website</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng kí
                                        online</a></li>
                                {{-- <li class="menu-item-has-children"><a href="{{ route('customer.register.online') }}">Liên hệ</a></li> --}}
                            </ul>
                        </div>
                        <!-- Offcanvas Menu End -->
                        <div class="offcanvas_footer">
                            <span><a href="mailto:"><i class="fa fa-envelope-o"></i>
                                    </a></span>
                            <div class="footer_social">
                                <ul class="d-flex">
                                    <li>
                                        <a class="facebook" href="#"><img
                                                src="{{ v(theme::url('assets/images/sc1.png')) }}" alt="Facebook"></a>
                                    </li>
                                    <li><a class="twitter" href="#"><img
                                                src="{{ v(theme::url('assets/images/sc2.png')) }}" alt="twitter"></a>
                                    </li>
                                    <li><a class="youtube" href="#"><img
                                                src="{{ v(theme::url('assets/images/sc3.png')) }}" alt="youtube"></a>
                                    </li>
                                    <li><a class="google" href="#"><img
                                                src="{{ v(theme::url('assets/images/sc4.png')) }}" alt="google"></a>
                                    </li>
                                    <li><a class="linkedin" href="#"><img
                                                src="{{ v(theme::url('assets/images/sc5.png')) }}" alt="linkedin"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 text-uppercase header__1">
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="active "><a href="{{ route('pages.individualFiber') }}" title="Khách hàng cá nhân">Khách hàng cá nhân</a></li>
                        <li><a href="{{ route('pages.enterpriseFiber') }}" title="Khách hàng doanh nghiệp">Khách hàng doanh nghiệp</a></li>
                        <li><a href="/gioi-thieu-ve-fpttelecom" title="Về FPT Telecom">Về FPT Telecom</a></li>
                    </ul>
                </div>
                <div class="col-sm-1 col-md-2 col-lg-3 header__2">
                    <div class="header__form">
                        <form method="GET" action="{{route('pages.news')}}">
                            <input type="text" name="q" value="{{ request()->get('q') }}"
                                class="search-query form-control" maxlength="100">
                            <button class="btn" type="submit">
                                <span class="fa fa-search">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-5 col-md-4 col-lg-4 header__3">
                    <ul class="list-group list-group-horizontal-xl">
                        <li>
                            <a href="{{ route('pages.support.contact') }}" title="Điểm giao dịch">
                                <img src="{{ v(theme::url('assets/images/topmenu-storelocator.png')) }}"
                                    alt="điểm giao dịch">
                                Điểm giao dịch
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Đăng nhập">
                                <img alt="Đăng nhập" src="{{ v(theme::url('assets/images/topmenu-login.png')) }}"
                                    alt="Đăng nhập">
                                Đăng nhập
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img alt="English" src="{{ v(theme::url('assets/images/en.png')) }}" alt="English">
                            </a>
                            <a href="">English</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="header-area header-three">
        <div class="header-middle space-40 sticker">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-6">
                        <div class="header-middle-inner">
                            <!-- Main Menu Start -->
                            <div class="header-menu float-left add-sticky">
                                <div class="sticky-container">
                                    <div class="logo">
                                        <a href="{{ route('home') }}"><img
                                                src="{{ v(theme::url('assets/images/logo.png')) }}"
                                                alt="Logo FPT Telecom" class="img-fluid"></a>
                                    </div>
                                    <nav class="main-menu">
                                        <ul>
                                            <li>
                                                <a title="[CẬP NHẬT] CÁC SẢN PHẨM DỊCH VỤ MỚI NHẤT CỦA FPT TELECOM 2021"
                                                    href="#">Sản phẩm dịch vụ <i
                                                        class="fa fa-angle-down"></i></a>
                                                <div class="mega-menu dropdown">
                                                    <ul class="mega-menu-inner d-flex">
                                                        <li>
                                                            <a href="#internet-fpt">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn1.png')) }}"
                                                                    alt="Internet FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn11.png')) }}"
                                                                    alt="Internet FPT">
                                                            </a>
                                                            <a href="#internet-fpt">Internet FPT</a>
                                                            <ul>
                                                                <li><a href="#internet-fpt">Cáp
                                                                        quang Cá nhân</a></li>
                                                                <li><a href="#internet-fpt">Cáp
                                                                        quang doanh nghiệp</a></li>
                                                                <li><a href="#combo-internet-th">Net + Truyền
                                                                        hình FPT</a></li>
                                                                <li><a href="#">SOC 1Gbps </a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#truyen-hinh-fpt">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn2.png')) }}"
                                                                    alt="Truyền hình FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn22.png')) }}"
                                                                    alt="Truyền hình FPT">
                                                            </a>
                                                            <a href="#truyen-hinh-fpt">Truyền hình FPT</a>
                                                            <ul>
                                                                <li><a href="#truyen-hinh-fpt">Gói kênh
                                                                        MAXY</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('pages.onlineService') }}">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn3.png')) }}"
                                                                    alt="Dịch vụ online FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn33.png')) }}"
                                                                    alt="Dịch vụ online FPT">
                                                            </a>
                                                            <a href="#fpt-play-box">Dịch vụ
                                                                Online</a>
                                                            <ul>
                                                                <li><a href="#fpt-play-box">FPT Play
                                                                        Box</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn4.png')) }}"
                                                                    alt="SmartHome FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn44.png')) }}"
                                                                    alt="SmartHome FPT">
                                                            </a>
                                                            <a href="#">Smart Home</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#fpt-camera">FPT
                                                                        Camera</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#fpt-ihome">FPT
                                                                        iHome</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.register.online') }}">Khuyến mại</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ <i
                                                        class="fa fa-angle-down"></i></a>
                                                <div class="mega-menu dropdown">
                                                    <ul class="mega-menu-inner d-flex">
                                                        <li>
                                                            <a href="#">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn5.png')) }}"
                                                                    alt="Hỗ trợ thông tin FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn55.png')) }}"
                                                                    alt="Hỗ trợ thông tin FPT">
                                                            </a>
                                                            <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ
                                                                thông tin</a>
                                                            <ul>
                                                                <li><a href="{{ route('pages.support.faq') }}">Câu hỏi
                                                                        thường gặp</a></li>
                                                                <li><a
                                                                        href="{{ route('pages.support.fptTelevision') }}">Hướng
                                                                        dẫn sử dụng</a></li>
                                                                <li><a
                                                                        href="{{ route('pages.support.procedureGuide') }}">Hướng
                                                                        dẫn thủ tục</a></li>
                                                                <li><a
                                                                        href="{{ route('pages.support.privacyPolicy') }}">Điều
                                                                        khoản bảo mật</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn6.png')) }}"
                                                                    alt="Hỗ trợ kỹ thuật FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn66.png')) }}"
                                                                    alt="Hỗ trợ kỹ thuật FPT">
                                                            </a>
                                                            <a
                                                                href="{{ route('pages.support.installationInstructions') }}">Hỗ
                                                                trợ kỹ thuật</a>
                                                            <ul>
                                                                <li><a
                                                                        href="{{ route('pages.support.installationInstructions') }}">Hướng
                                                                        dẫn cài đặt</a></li>
                                                                <li><a
                                                                        href="{{ route('pages.support.resovleProblem') }}">Xử
                                                                        lý sự cố</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn7.png')) }}"
                                                                    alt="Liên hệ FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn77.png')) }}"
                                                                    alt="Liên hệ FPT">
                                                            </a>
                                                            <a href="{{ route('pages.support.contact') }}">Liên hệ
                                                                24/7</a>
                                                            <ul>
                                                                <!-- <li><a href="https://hi.fpt.vn/" target="_black">Hi
                                                                        FPT</a></li> -->
                                                                <li><a href="{{ route('pages.support.contact') }}">Điểm
                                                                        giao dịch</a></li>
                                                                <li><a href="tel:{{ setting('fpt_hotline') }}">Tổng đài {{ setting('fpt_hotline') }}</a>
                                                                </li>
                                                                <li><a href="https://www.facebook.com/fpttelecom.net.vn"
                                                                        target="_black">Fanpage</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img class="nothover"
                                                                    src="{{ v(theme::url('assets/images/mn8.png')) }}"
                                                                    alt="Phản hồi khách hàng FPT">
                                                                <img class="hover"
                                                                    src="{{ v(theme::url('assets/images/mn88.png')) }}"
                                                                    alt="Phản hồi khách hàng FPT">
                                                            </a>
                                                            <a href="#">Phản hồi khách hàng</a>
                                                            <ul>
                                                                <li><a href="#">Góp ý</a></li>
                                                                <li><a href="#">Khảo sát</a></li>
                                                                <li><a href="#">Đánh giá về website</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Đăng ký Online</a></li>
                                            {{-- <li><a href="{{ route('customer.register.online') }}">Liên hệ</a></li> --}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Main Menu End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
