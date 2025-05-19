@extends('public.layout_custom')

@section('css')
<link rel="stylesheet" href="{{ v(theme::url('assets/css/jquery.tocify.css')) }}">
<style>
    .btn.btn-mucluc {
        width: 100%;
        text-align: left;
        font-weight: bold;
        font-size: 1.2rem;
        color: #333;
        background: rgba(237, 237, 237, 0.95);
        border-radius: 0;
        border: 1px solid #333;
    }

    #toc ul,
    #toc ul li,
    #toc ul li a {
        display: block;
        width: 100%;
    }

    #toc>ul>li {
        padding-left: 10px;
    }

    .btn.btn-mucluc:focus,
    .btn.btn-mucluc:hover {
        box-shadow: none;
        outline: none;
    }

    .box-mucluc {
        display: none;
    }

    .box {
        padding: 20px;
        background-color: #f6f6f6;
        margin-bottom: 20px;
        word-wrap: break-word;
    }

    .box i {
        line-height: 60px;
        height: 60px;
        width: 60px;
        font-size: 60px;
        margin: 0;
        float: left;
        margin-left: -70px;
    }

    .box div.box-inner-block {
        padding-left: 70px;
        min-height: 50px;
    }

    /* Box shadow */
    .box.shadow {
        border: 1px solid #ddd;
        -webkit-box-shadow: 0 0 5px rgb(153 153 153 / 60%);
        -moz-box-shadow: 0 0 5px rgba(153, 153, 153, .6);
        box-shadow: 0 0 5px rgb(153 153 153 / 60%);
    }

    .box.shadow div.box-inner-block {
        padding: 0;
    }

    /* Box info */
    .box.info {
        background: #d6f6ff;
        border-color: #bfe3ec;
    }

    .box.info i {
        color: #2cb4da;
    }

    /* Box success */
    .box.success {
        background: #e2f2cb;
        border-color: #d1e4b7;
    }

    .box.success i {
        color: #8ab84d;
    }

    /* Box warning */
    .box.warning {
        background: #fffddb;
        border-color: #e9e59e;
    }

    .box.warning i {
        color: #ecc21b;
    }

    /* Box error */
    .box.error {
        background: #ffe6e2;
        border-color: #eebfb8;
    }

    .box.error i {
        color: #f03317;
    }

    /* Box download */
    .box.download {
        background: #e2f2cb;
        border-color: #d1e4b7;
    }

    .box.download i {
        color: #8ab84d;
    }

    /* Box note */
    .box.note {
        background: #fffddb;
        border-color: #e9e59e;
    }

    .box.note i {
        color: #ecc21b;
    }


    /* Shortcode button */
    a.shortc-button {
        border: none;
        cursor: pointer;
        padding: 0 10px;
        display: inline-block;
        margin: 10px 0 0;
        font-weight: 700;
        outline: none;
        position: relative;
        background: #bdc3c7;
        color: #fff !important;
        text-decoration: none;
        font-size: 10px;
        height: 25px;
        line-height: 25px;
        opacity: .9;
        overflow: hidden;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    a.shortc-button.medium {
        font-size: 14px;
        height: 45px;
        line-height: 45px;
        padding: 0 15px;
    }

    a.shortc-button.big {
        font-size: 24px;
        height: 65px;
        line-height: 65px;
        padding: 0 20px;
    }

    a.shortc-button.red {
        background: #e74c3c;
    }

    a.shortc-button.orange {
        background: #e67e22;
    }

    a.shortc-button.blue {
        background: #3498db;
    }

    a.shortc-button.green {
        background: #2ecc71;
    }

    a.shortc-button.black {
        background: #222;
    }

    a.shortc-button.white {
        background: #ecf0f1;
        color: #333 !important;
    }

    a.shortc-button.pink {
        background: #ff00a2;
    }

    a.shortc-button.purple {
        background: #9b59b6;
    }

    .content_post ul {
        list-style: disc;
        padding: 0;
        margin: 0;
        padding-left: 1rem
    }

    .content_post blockquote p {
        color: #999;
        padding: 0 18px;
        font-size: 18px;
        line-height: 28px;
        font-style: italic;
        border: 4px solid #777;
        border-width: 0 0 0 4px;
    }

    .hasIframe {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }

    .hasIframe iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .block-title.block__orange>h1 {
        color: #f06e28;
        display: flex;
        align-items: center;
        border-bottom: 2px solid #ff6634;
        padding-right: 0px;
        padding-bottom: 4px;
        margin-bottom: 20px;
        font-size: 24px;
        text-align: left;
    }

    .content_post>h1,
    .content_post>h2,
    .content_post>h3,
    .content_post>h4,
    .content_post>h5,
    .content_post>h6,
    .content_post>p {
        margin-bottom: 24px !important;
        margin-top: 24px;
    }

    .content_post p.hidden {
        display: none !important;
    }

    @media only screen and (max-width: 475px) {
        .block-title.block__orange>h1 {
            font-size: 20px;
        }
    }
</style>
@endsection
@section('content')


<!--=====================
   Breadcrumb Aera End
   =========================-->
{{-- <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>
                            <h1><a href="{{ route('home') }}">Trang chủ</a></h1>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="news news--1">
    <div class="container">
        <div class="row mt-20 mb-20">
            <div class="col-lg-12">
                <div class="block-title block__orange">
                    <h1>
                        <span class="block__image">
                            <img src="{{ v(theme::url('assets/images/latest-news.png')) }}" alt="Tin mới nhất">
                        </span>
                        {{ $page->name }}
                    </h1>
                </div>
                @if ($page->is_toc)
                <div class="row box-mucluc" style="margin-bottom: 30px;">
                    <div class="col-lg-6">
                        <button class="btn btn-mucluc" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-list-ol" aria-hidden="true"></i>
                            <span>Mục lục</span>
                        </button>
                        <div class="collapse" id="collapseExample">
                            <div id="toc">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content_post">
                            {!! $page->body !!}
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <section class="tutorial">
                            <div class="container">
                                <div class="block-title block__orange">
                                    <h2>
                                        <span class="block__image">
                                            <img alt=""
                                                src="{{ v(theme::url('assets/images/icon/huong dan fpt.png')) }}">
                                        </span>
                                        HƯỚNG DẪN
                                    </h2>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <a class="bold" href="{{ route('pages.support.procedureGuide') }}"
                                        target="_blank">CHÍNH SÁCH THỦ TỤC</a>
                                </div>
                            </div>
                        </section>
                        <section class="support">
                            <div class="container">
                                <div class="block-title block__orange">
                                    <h2>
                                        <span class="block__image">
                                            <img alt=""
                                                src="{{ v(theme::url('assets/images/icon/register fpt.png')) }}">
                                        </span>
                                        ĐĂNG KÝ NGAY
                                    </h2>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 text-center support--left">
                                        <a title="Đăng ký Online" href="#" data-toggle="modal" data-target="#register_custom_modal">
                                            <img src="{{ v(theme::url('assets/images/icon/register-fpt.png')) }}"
                                                alt="">
                                        </a>
                                        <p>
                                            <a title="Đăng ký Online" href="#"
                                                data-toggle="modal" data-target="#register_custom_modal"
                                                class="text-uppercase">Đăng ký
                                                Online</a>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 text-center support--center">
                                        <a href="tel:{{ json_decode($page->custom)->phone_contact }}"
                                            title="Hotline bán hàng: {{ json_decode($page->custom)->phone_contact }}">
                                            <img src="{{ v(theme::url('assets/images/icon/hotline-fpt.png')) }}" alt="">
                                        </a>
                                        <p>
                                            <a href="tel:{{ json_decode($page->custom)->phone_contact }}"
                                                title="Hotline bán hàng: {{json_decode($page->custom)->phone_contact  }}"
                                                class="text-uppercase">Hotline :
                                                {{ json_decode($page->custom)->phone_contact }}</a>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 text-center support--right">
                                        <a href="{{ route('pages.support.procedureGuide') }}" title="Hỗ trợ">
                                            <img src="{{ v(theme::url('assets/images/icon/support fpt.png')) }}" alt="">
                                        </a>
                                        <p>
                                            <a href="{{ route('pages.support.procedureGuide') }}" title="Hỗ trợ"
                                                class="text-uppercase">Hỗ trợ</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @if ($currentUser && ($currentUser->hasRoleName('admin') ||
                        $currentUser->hasAccess('admin.posts.edit')))
                        <a style="color: #f63;font-size: 1.2rem;" class="post-edit-link"
                            href="{{ route('admin.posts.edit', ['id' => $page->id]) }}" target="_black">Edit</a>
                        @endif
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-12 col-md-12" style="margin: 15px 0 30px 0;">
                <h1>Bài viết liên quan</h1>
            </div>
            @php
            $patternFirstBox = '/\[(box).(.*?)\]/';
            $patternEndBox = '/\[\/box\]/';
            @endphp --}}
            {{-- @foreach ($post_related as $item)
            <div class="col-lg-4 col-md-4 col-sm-6 news__col">
                <!-- Single Blog Start -->
                <div class="single-blog">
                    <div class="blog-image mb-10">
                        <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}"><img
                                src="{{ $item->logo->path }}" alt="{{ $item->name }}" class="img-fluid"></a>
                    </div>
                    <div class="blog-content">
                        <h5 class="news__title mb-10">
                            <a href="{{ route('pages.news.show', ['slug' => $item->slug]) }}">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <ul class="meta">
                            <li><a href="#"><span class="news__category">{{ count($item->groups) > 0 ?
                                        $item->groups[0]->name : '' }}</span>,{{$item->date}}</a></li>
                        </ul>
                        <div class="desc">
                            <p>
                                {!! subwords( strip_tags(preg_replace(array($patternFirstBox, $patternEndBox), '',
                                $item->content)), 25 ) !!}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
            </div>
            @endforeach --}}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="fb-like" data-href="{{ url()->current() }}" data-width="" data-layout="button_count"
                    data-action="like" data-size="small" data-share="true"></div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! json_decode($page->custom)->chatbox_script ?? "" !!}
<script>
    $(document).ready(function(){
        var select_province_custom = $('.select-province-custom');
        var select_province_custom_2 = $('.select-province-custom-2');
        if(select_province_custom.length > 0){
            $('.select-province-custom').select2();
        }
        if(select_province_custom_2.length > 0){
            $('.select-province-custom-2').select2();
        }
    });
</script>
<script src="{{ v(theme::url('assets/js/jquery.tocify.js')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $.validator.addMethod(
            "emailRegex",
            function(value, element) {
                return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
            },
            "Vui lòng nhập đúng định dạng Email"
        );
        $.validator.addMethod(
            "phoneRegex",
            function(value, element) {
                return /(0[3|5|7|8|9])+([0-9]{8})\b/.test(value);
            },
            "Vui lòng nhập đúng số điện thoại"
        );
        $(".needs-validation").validate({
            rules: {
                name: "required",
                phone: {
                    required: true,
                    phoneRegex: true
                },
                email: {
                    required: true,
                    emailRegex: true
                },
                address: "required"
            },
            messages: {
                name: "Vui lòng nhập họ tên.",
                phone: {
                    required: "Vui lòng nhập SĐT",
                    phoneRegex: "Vui lòng nhập đúng số điện thoại"
                },
                email: {
                    required: "Vui lòng nhập Email.",
                    emailRegex: "Vui lòng nhập đúng định dạng Email"
                },
                address: 'Vui lòng nhập địa chỉ của bạn.'
            }
            });
        });
</script>
<script>
    $('document').ready(function(){
        $('p iframe').parent().addClass('hasIframe');
        if($('.content_post h1').length){
            $('.box-mucluc').fadeIn();
            $("#toc").tocify({
                context: '.content_post',
                selectors: "h1, h2, h3, h4",
                showAndHide: false,
                history: false,
                scrollTo: 150,
                extendPage: false
            }).data("toc-tocify");
        }else if($('.content_post h2').length){
            $('.box-mucluc').fadeIn();
            $("#toc").tocify({
                context: '.content_post',
                selectors: "h2, h3, h4, h5",
                showAndHide: false,
                history: false,
                scrollTo: 150,
                extendPage: false
            }).data("toc-tocify");
        }else if($('.content_post h3').length){
            $('.box-mucluc').fadeIn();
            $("#toc").tocify({
                context: '.content_post',
                selectors: "h3, h4, h5",
                showAndHide: false,
                history: false,
                scrollTo: 150,
                extendPage: false
            }).data("toc-tocify");
        }else if($('.content_post h4').length){
            $('.box-mucluc').fadeIn();
            $("#toc").tocify({
                context: '.content_post',
                selectors: "h4, h5",
                showAndHide: false,
                history: false,
                scrollTo: 150,
                extendPage: false
            }).data("toc-tocify");
        }
    });
</script>
<script>
    function checkToggle(){
        var toggle = $('.toggle-shortcode');
        if( toggle.length > 0 ){
            toggle.each(function(index){
                $(this).find('div.collapse').toggleClass('has-show');
                if( !$(this).find('div.collapse').hasClass('has-show') ){
                    var self = $(this);
                    self.find('div[data-unique]').each(function(){
                        var unique = $(this).data('unique');
                        $('.box-mucluc li[data-unique="'+unique+'"]').hide();
                    });
                }else{
                    var self = $(this);
                    self.find('div[data-unique]').each(function(){
                        var unique = $(this).data('unique');
                        $('.box-mucluc li[data-unique="'+unique+'"]').show();
                    });
                }
            });
        }
    }
    $(document).ready(function(){
        $('.slick-custom div[data-unique]').each(function(){
            var unique = $(this).data('unique');
            $('li[data-unique="'+unique+'"]').remove();
        });
        var toggle = $('.toggle-shortcode');
        if( toggle.length > 0 ){
            toggle.each(function(index){
                var self = $(this);
                self.find('div[data-unique]').each(function(){
                    var unique = $(this).data('unique');
                    $('.box-mucluc li[data-unique="'+unique+'"]').hide();
                });
            });
        };
        $('.toggle-shortcode button[data-toggle=collapse]').click(() => {
            checkToggle();
        });

    });

</script>
{{-- Prevent redirect to other page --}}
@php
    $isActiveMenu = false;
    foreach(json_decode($page->custom) as $key => $custom) {
        if($key == "active_menu") {
            $isActiveMenu = true;
        }
    }
@endphp
@if(!$isActiveMenu)
    <script>
        $("li > a").click(function(e) {
            e.preventDefault();
        })
    </script>
@endif
@endsection