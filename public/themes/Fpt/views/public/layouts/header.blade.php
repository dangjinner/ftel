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
                        <h1 style="display: none;">
                            <?php echo isset($title) ? $title : ''; ?>
                        </h1>
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
                                    <input placeholder="Từ khóa ..." type="text" value="{{ request()->get('q') }}"
                                        name="q">
                                    <button type="submit">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                        <!-- Offcanvas Menu Start -->
                        <div class="offcanvas_menu_cover text-left">
                            <ul class="offcanvas_main_menu">
                                @foreach($primaryMenu as $menu)
                                    <li class="menu-item-has-children">
                                        <a title="{{ $menu->name }}" href="{{ $menu->url }}">
                                            {{ $menu->name }}
                                        </a>
                                        <ul class="sub-menu">
                                            @foreach($menu->children()->get() as $menuItem)
                                                <li class="menu-item-has-children">
                                                    <a title="{{ $menuItem->name }}" href="{{ $menuItem->url }}">
                                                        {{ $menuItem->name }}
                                                    </a>
                                                    <ul class="sub-menu">
                                                        @foreach($menuItem->children()->get() as $menuItemChild)
                                                            <li>
                                                                <a href="{{ $menuItemChild->url }}">
                                                                    {{ $menuItemChild->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                @endforeach
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
                        <li class="active "><a href="{{ route('pages.individualFiber') }}"
                                title="Khách hàng cá nhân">Khách hàng cá nhân</a></li>
                        <li><a href="{{ route('pages.enterpriseFiber') }}" title="Khách hàng doanh nghiệp">Khách hàng
                                doanh nghiệp</a></li>
                        <li><a href="/gioi-thieu-ve-fpttelecom" title="Về FPT Telecom">Về FPT
                                Telecom</a></li>
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
                                            @foreach($primaryMenu as $menu)
                                            <li>
                                                <a title="{{ $menu->name }}" href="{{ $menu->url }}">{{ $menu->name }}
                                                    <i class="fa fa-angle-down"></i></a>
                                                @if($menu->children()->count() > 0)
                                                <div class="mega-menu dropdown">
                                                    <ul class="mega-menu-inner d-flex">
                                                        @foreach($menu->children()->get() as $menuItem)
                                                        <li>
                                                            <a href="{{ $menuItem->url }}">
                                                                <img class="nothover"
                                                                    src="{{ $menuItem->background_image->path }}"
                                                                    alt="{{ $menuItem->name }}">
                                                                @if($menuItem->background_image_2->path !== null)
                                                                <img class="hover"
                                                                    src="{{ $menuItem->background_image_2->path }}"
                                                                    alt="{{ $menuItem->name }}">
                                                                @else
                                                                <img class="hover"
                                                                    src="{{ $menuItem->background_image->path }}"
                                                                    alt="{{ $menuItem->name }}">
                                                                @endif
                                                            </a>
                                                            <a href="{{ $menuItem->url }}">{{ $menuItem->name }}</a>
                                                            <ul>
                                                                @foreach($menuItem->children()->get() as
                                                                $menuItemChildren)
                                                                <li><a href="{{ $menuItemChildren->url }}">
                                                                        {{ $menuItemChildren->name }}
                                                                    </a></li>
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif

                                            </li>
                                            @endforeach
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
