<footer class="mt-30">
    <!-- Newslatter area start -->

    <div class="always-on">
        @if(setting('fpt_zalo'))
            <div class="group-zalo-chat col-xs-12 fix-pad ">
                <div id="zalo-chat" class="bg-gray text-center pull-right">
                    <a href="https://zalo.me/{{ setting('fpt_zalo') }}" title="{{ setting('fpt_zalo') }}"><img
                            src="/storage/media/7wLH2u10XbW7riz9Fo6eY8jsDPkE7bODTvRfft6u.png" alt="Zalo Chat"></a>
                </div>
                <div id="zalo-chat-text" class="text-number hide text-center pull-right">
                    <p>Zalo</p>
                    <a>{{ setting('fpt_zalo') }}</a>
                </div>
            </div>
        @endif

        @if(!Cookie::get('aff_code'))
            <div class="group-call col-xs-12 fix-pad ">
                <div id="group-call" class="bg-gray text-center pull-right">
                    <a href="tel:{{ setting('fpt_hotline') }}" title="{{ setting('fpt_hotline') }}"><img
                            src="{{ v(theme::url('assets/images/call.png')) }}" alt="Call FPT"></a>
                </div>
                <div id="group-call-text" class="text-number hide text-center pull-right">
                    <p>Hotline Đăng ký</p>
                    @auth
                        @php
                           $agencyAccount = auth()->user()->getAgencyAccount();
                        @endphp
                        @if($agencyAccount)
                            <a>{{ auth()->user()->phone_number }}</a>
                        @else
                            <a>{{ setting('fpt_hotline') }}</a>
                        @endif
                    @else
                        <a>{{ setting('fpt_hotline') }}</a>
                    @endauth
                </div>
            </div>
        @endif

        <div class="group-chat col-xs-12 fix-pad " id="chatBoxIcon">
            <div livechat-show="true" id="group-chat" class="bg-gray text-center pull-right"
                 style="background: {{ setting('wmt_chat_icon_bg_color') }}">
                <a href="#"><img src="{{ v(theme::url('assets/images/chat.png')) }}" loading="lazy" alt="Live Chat FPT"></a>
            </div>
            <div id="group-chat-text" class="text-number hide text-center pull-right"
                 style="background: {{ setting('wmt_chat_icon_bg_color') }}">
                <p>{{ setting('wmt_chat_icon_text') }}</p>
            </div>

        </div>
    </div>
    <!-- Newslatter area End -->
    <!-- Footer Top Start -->
    <div class="footer-top">
        {{-- <img src="{{ v(theme::url('assets/images-jpeg/footer.jpg')) }}" alt="background" class="footer__bg"> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-6">
                            {!! setting('footer_col_1') !!}
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            {!! setting('footer_col_2') !!}
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            {!! setting('footer_col_3') !!}
                        </div>
                        <div class="col-lg-4 col-md-6 col-6">
                            <div class="widgets_container">
                                <!--<a href="/fpt-telecom-tuyen-dung-chuyen-vien-kd-tai-ha-noi">-->
                                <!--    <img style="width: 250px;" class="img-fluid" src="{{ v(theme::url('assets/images/footer_new.png')) }}" alt="FPT Telecom">-->
                                <!--</a>-->
                                <a class="gif-thietkewebsite"
                                   href="{{ setting('footer_banner_url') ?? 'https://webmaster.com.vn/thiet-ke-website' }}"
                                   title="Thiết kế website">
                                    <img style="width: 250px; margin-top: 5px;" width="250" alt="Thiết kế website"
                                         src="{{ $footerBanner->path ?? '/storage/media/Fw1BBndmXGgwKqkSURA1sOES3tWaF7JZp6oLYxA7.jpeg' }}"
                                    >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 footer__followus">
                    <div class="row footer__followus--row">

                        {!! setting('footer_col_4') !!}
                        <div class="col-lg-7 footer__followus--right">
                            <h3 class="title-footer-item">
                                {!! setting('footer_col_5_title') !!}
                            </h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="brand-logo">
                                        {!! setting('footer_col_5_images') !!}
                                    </div>
                                </div>
                                {!! setting('footer_col_6') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="footer-bottom-content">
                        {!!  setting('footer_copyright') !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>

@include('public.sections.chat_box.chat_box')
@include('public.sections.login-modal')


<!-- Scroll To Top Start -->
<a class="scroll-to-top" href="#">
    <img src="{{ v(theme::url('assets/images/top.png')) }}" alt="icon">
</a>
<!-- Scroll To Top End -->

<!-- Modal Register Service -->
<div class="modal fade" id="modalRegisterService" tabindex="-1" role="dialog"
     aria-labelledby="modalRegisterServiceTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content pay pay-popup">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="pay_form">
                @if(isset($errors) && $errors->any() && request()->has('sex'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            document.getElementById("btn-btnpopup").click();
                        });
                    </script>
                @endif
                <form action="{{ route('home.kh.dangkydichvu') }}" method="post" id="formRegisterServiceFPT">
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
                                @foreach($registerServiceOptions as $option)
                                    <option value="{{ $option }}"
                                        {{ old('options_service') == $option ? 'selected' : '' }}>
                                        {{$option}}</option>
                                @endforeach
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
                        <div class=" col-lg-12 col-md-12 col-12" style="display: 'none">
                            <input type="hidden" name="utm_source" value="{{ request()->get('utm_source') }}"/>
                            <input type="hidden" name="utm_medium" value="{{ request()->get('utm_medium') }}"/>
                            <input type="hidden" name="utm_campaign" value="{{ request()->get('utm_campaign') }}"/>
                            <input type="hidden" name="utm_term" value="{{ request()->get('utm_term') }}"/>
                            <input type="hidden" name="utm_content" value="{{ request()->get('utm_content') }}"/>
                            <input type="hidden" name="current_url" value="{{ request()->url() }}"/>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <p>(*) Vui lòng điền đầy đủ các thông tin này</p>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-12 form_submit">
                            <button type="submit" id="submitDk">Đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
