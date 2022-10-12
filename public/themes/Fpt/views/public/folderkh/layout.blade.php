<!doctype html>
<html class="no-js" lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="fb:app_id" content="151028583643197" />
    <meta property="fb:admins" content="100005895009679" />
    <meta property="fb:admins" content="100002259878240" />
    {!! SEO::generate() !!}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Start Custom CSS -->
    <link rel="stylesheet" href="{{ v(theme::url('assets/fonts/fontawesome/css/all.css')) }}">
    <!-- End Custom CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,100;1,300;1,500&display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ v(theme::url('assets/images/favicon.ico'))}}">
    <!-- CSS
        ============================================ -->

    <link rel="stylesheet" href="{{ v(theme::url('assets/css/main.min.css')) }}">
    <style>
        span.select2-container {
            transition: unset;
        }
        .modal-dialog.modal-dialog-centered{
            min-width: 800px;
            max-width: 800px;
        }
        .pay .pay_form {
            background-color: #fff;
            padding: 1rem;
        }
        .pay .pay_form form {
            width: 100%;
            padding: 10px;
        }
        .pay .pay_form p {
            font-size: 0.9rem;
            padding-top: 1rem;
            font-weight: 700;
            margin-bottom: 0;
        }
        .pay.pay-popup .note {
            color: red;
            font-style: italic;
            font-size: .95rem;
            margin-bottom: 15px;
            display: block;
        }
        .pay .pay_form .sex {
            display: flex;
            align-items: center;
        }
        .pay .pay_form .sex input#male, .pay .pay_form .sex input#female {
            margin-right: 0.2rem;
            width: 1rem;
            height: 1rem;
        }
        .pay .pay_form .sex label {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0px;
            font-size: 14px;
            margin-right: 2rem;
            font-size: 1rem;
        }
        .pay .pay_form input[type='radio']:checked + label {
            color: #0D56AB;
            font-weight: 600;
        }
        .pay .pay_form .form__content {
            padding: 1rem 0rem 0rem 0rem;
        }
        #exampleModalCenter .form__content div.col-lg-6 {
            margin-bottom: 1rem;
        }
        .pay .pay_form .form__content .form_submit input[type=submit]{
            width: auto;
            padding: 0.5rem 4rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin-top: 1rem;
            background-image: linear-gradient(to left, #3F8EFC, #2876E2);
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #exampleModalCenter label.error, #exampleModalCenter span.text-danger {
            color: #dc3545!important;
            font-size: 14px;
        }
    </style>
    @yield('css')


    <!-- Không cho copy hình -->
    <script language="JavaScript1.2">
        var msgpopup="Xin vui lòng không copy nội dung của Webmaster Vietnam";
            function handle(){
                // if(toShowMessage== "1") alert(message);
                //     if(closeSelf== "1") self.close();
                //     return false;
            }
            function mouseDown() {
                if (event.button == "2" || event.button == "3"){handle();}
            }
            function mouseUp(e) {
                //if (document.layers || (document.getElementById && !document.all)){
                    if (e.which == "2" || e.which == "3"){ handle();}
                //}
            }
            document.onmousedown=mouseDown;
            document.onmouseup=mouseUp;
            document.oncontextmenu=new Function("alert(msgpopup);return false")
    </script>

    <script type="text/javaScript">
        function killCopy(e){ return false }
            function reEnable(){ return true }
            document.onselectstart=new Function ("return false");
            if (window.sidebar)
            { document.onmousedown=killCopy;
            document.onclick=reEnable; }
        </script>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=151028583643197&autoLogAppEvents=1"
        nonce="L4NEGwnh"></script>

    @include('public.folderkh.layouts.header')

    @yield('content')

    @include('public.folderkh.layouts.footer')

    <!-- Scroll To Top Start -->
    <a class="scroll-to-top" href="#">
        <img src="{{ v(theme::url('assets/images/top.png')) }}" alt="icon-webmaster">
    </a>
    <!-- Scroll To Top End -->
    <!-- modal area start-->
    <!-- modal area end-->
    <!-- JS
        ============================================ -->
    <!-- jQuery JS -->
    <script src="{{ v(theme::url('assets/js/vendor/jquery-3.4.1.min.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>


    <script src="{{ v(theme::url('assets/js/vendor/bootstrap.min.js')) }}"></script>
    {{-- Plugins JS --}}
    <script src="{{ v(theme::url('assets/js/plugins/plugins.js')) }}"></script>


    <script src="{{ v(theme::url('assets/js/plugins/slick.min.js')) }}"></script>


    <script src="{{ v(theme::url('assets/js/plugins/sticky-sidebar.min.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ v(theme::url('assets/js/main.js')) }}"></script>

    <script>
        $(function(){if(window._userdata&&_userdata.page_desktop)window.location=_userdata.page_desktop});jQuery(document).ready(function($){var $ctsearch=$('#ct-search'),$ctsearchinput=$ctsearch.find('input.ct-search-input'),$body=$('html,body'),openSearch=function(){$ctsearch.data('open',true).addClass('ct-search-open');$ctsearchinput.focus();return false},closeSearch=function(){$ctsearch.data('open',false).removeClass('ct-search-open')};$ctsearchinput.on('click',function(e){e.stopPropagation();$ctsearch.data('open',true)});$ctsearch.on('click',function(e){e.stopPropagation();if(!$ctsearch.data('open')){openSearch();$body.off('click').on('click',function(e){closeSearch()})}else{if($ctsearchinput.val()===''){closeSearch();return false}}})});$(function(){$("img").on("error",function(){$(this).attr({alt:this.src,src:""})})});shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f,s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){}),shortcut.add("Ctrl+S",function(){}),shortcut.add("Ctrl+Shift+I",function(){}),shortcut.add("Ctrl+Shift+J",function(){}),shortcut.add("Ctrl+Shift+K",function(){}),shortcut.add("Ctrl+K",function(){}),shortcut.add("F12",function(){}),shortcut.add("Ctrl+U",function(){});
    </script>

    <script>
        $(document).ready(function(){
                $('.select-province').on('change', function(){
                    if( $(this).val() ){
                        window.location = $(this).val();
                    }
                });
                var select_province = $('.select-province');
                if(select_province.length > 0){
                    $('.select-province').select2({
                        placeholder: "-- Chọn --"
                    });
                }
            });
    </script>
    @yield('script')
    <!--{!! setting('custom_footer_assets') !!}-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $.validator.addMethod("regexPhone",
                function(value, element) {
                    return /(0[3|5|7|8|9])+([0-9]{8})\b/.test(value);
                },
                "Vui lòng nhập đúng SĐT"
            );
            $("#formdk").validate({
                rules: {
                    sex: "required",
                    name: {
                        required: true,
                        minlength: 2
                    },
                    phone: {
                        required: true,
                        regexPhone: true
                    },
                    address: {
                        required: true
                    },
                    options_service: 'required'
                },
                messages: {
                    sex: "Vui lòng chọn",
                    name: {
                        required: "Vui lòng nhập tên",
                        minlength: "Tên tối thiểu 2 kí tự"
                    },
                    phone: {
                        required: "Vui lòng nhập SĐT",
                        minlength: "Vui lòng nhập đúng SĐT"
                    },
                    address: {
                        required: "Vui lòng nhập địa chỉ",
                    },
                    options_service: "Vui lòng chọn dịch vụ"
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "sex") {
                        error.insertAfter(element.closest('div'));
                    }else{
                        error.insertAfter(element);
                    }
                }
            });
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content pay pay-popup">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="pay_form">
                    @if(isset($errors) && $errors->any() && request()->has('sex'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("btn-btnpopup").click();
                        });
                    </script>
                    @endif
                    <form action="{{ route('home.kh.dangkydichvu') }}" method="post" id="formdk">
                        @csrf
                        <p class="title-header">VUI LÒNG NHẬP THÔNG TIN CỦA BẠN :</p>
                        <span class="note">Chúng tôi sẽ liên hệ với Bạn sau 5 phút đăng ký</span>
                        <div class="sex">
                            <input type="radio" name="sex" id="male" checked value="male"
                                {{ old('sex')=="male" ? 'checked' : '' }}>
                            <label for="male"> Anh</label>
                            <input type="radio" name="sex" id="female" value="female"
                                {{ old('sex')=="female" ? 'checked' : '' }}>
                            <label for="female"> Chị</label>
                        </div>
                        <div class="row form__content">
                            <div class="col-lg-6 col-md-6 col-6  form-name">
                                <input class="name form-control" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Nhập họ và tên *">
                                @if (isset($errors) && $errors->first('name'))
                                <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-6  form-phone">
                                <input class="phone form-control" type="number" name="phone" value="{{ old('phone') }}"
                                    placeholder="Nhập số điện thoại *">
                                @if (isset($errors) && $errors->first('phone'))
                                <span class="help-block text-danger">{!! $errors->first('phone') !!}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-6  form-email">
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}"
                                    placeholder="Nhập địa chỉ">
                                @if (isset($errors) && $errors->first('address'))
                                <span class="help-block text-danger">{!! $errors->first('address') !!}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-6  form-email">
                                <select name="options_service" id="options_service" class="form-control">
                                    <option value="">Vui lòng lựa chọn dịch vụ</option>
                                    <option value="Internet FPT"
                                    {{ old('options_service')=="Internet FPT" ? 'selected' : '' }}>Internet FPT</option>
                                    <option value="Truyền hình FPT"
                                    {{ old('options_service')=="Truyền hình FPT" ? 'selected' : '' }}>Truyền hình FPT </option>
                                    <option value="Combo Internet + Truyền hình FPT"
                                    {{ old('options_service')=="Combo Internet + Truyền hình FPT" ? 'selected' : '' }}>Combo Internet + Truyền
                                        hình FPT</option>
                                    <option value="FPT Camera"
                                    {{ old('options_service')=="FPT Camera" ? 'selected' : '' }}>FPT Camera</option>
                                    <option value="Combo Internet + Camera"
                                    {{ old('options_service')=="Combo Internet + Camera" ? 'selected' : '' }}>Combo Internet + Camera</option>
                                    <option value="FPT Play Box"
                                    {{ old('options_service')=="FPT Play Box" ? 'selected' : '' }}>FPT Play Box</option>
                                    <option value="FPT iHome"
                                    {{ old('options_service')=="FPT iHome" ? 'selected' : '' }}>FPT iHome</option>
                                    <option value="Dịch vụ khác"
                                    {{ old('options_service')=="Dịch vụ khác" ? 'selected' : '' }}>Dịch vụ khác</option>
                                </select>
                                @if (isset($errors) && $errors->first('options_service'))
                                <span class="help-block text-danger">{!! $errors->first('options_service') !!}</span>
                                @endif
                            </div>
                            {{-- <input class="email" type="Email" name="email" value="" placeholder="Nhập Email "> --}}
                            <div class=" col-lg-12 col-md-12 col-12 form_messages">
                                <textarea class="form-control" rows="5" name="comment" value="{{ old('comment') }}"
                                    placeholder="Thông điệp nhắn gửi"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <p>(*) Vui lòng điền đầy đủ các thông tin này</p>
                            </div>
                            <div class=" col-lg-12 col-md-12 col-12 form_submit">
                                <input type="submit" name="" id="submitDk" value="Đăng ký">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
