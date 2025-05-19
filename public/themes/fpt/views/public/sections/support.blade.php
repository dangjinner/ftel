<section class="tutorial">
    <div class="container">
        <div class="block-title block__orange">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/icon/huong dan fpt.png')) }}">
                </span>
                HƯỚNG DẪN
            </h2>
        </div>
        <div class="col-xs-12 text-center">
            <a class="bold" href="{{ route('pages.support.procedureGuide') }}" target="_blank">CHÍNH SÁCH THỦ TỤC</a>
        </div>
    </div>
</section>
<section class="support">
    <div class="container">
        <div class="block-title block__orange">
            <h2>
                <span class="block__image">
                    <img alt="" src="{{ v(theme::url('assets/images/icon/register fpt.png')) }}">
                </span>
                ĐĂNG KÝ NGAY
            </h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 text-center support--left">
                <a title="Đăng ký Online" href="{{ route('pages.register') }}">
                    <img src="{{ v(theme::url('assets/images/icon/register-fpt.png')) }}" alt="">
                </a>
                <p>
                    <a title="Đăng ký Online" href="{{ route('pages.register') }}" title="Đăng ký Online"
                        class="text-uppercase">Đăng ký Online</a>
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 text-center support--center">
                <a href="tel:{{ setting('fpt_hotline') }}" title="Hotline bán hàng: {{ setting('fpt_hotline') }}">
                    <img src="{{ v(theme::url('assets/images/icon/hotline-fpt.png')) }}" alt="">
                </a>
                <p>
                    <a href="tel:{{ setting('fpt_hotline') }}" title="Hotline bán hàng: {{ setting('fpt_hotline') }}" class="text-uppercase">Hotline :
                        {{ setting('fpt_hotline') }}</a>
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 text-center support--right">
                <a href="{{ route('pages.support.procedureGuide') }}" title="Hỗ trợ">
                    <img src="{{ v(theme::url('assets/images/icon/support fpt.png')) }}" alt="">
                </a>
                <p>
                    <a href="{{ route('pages.support.procedureGuide') }}" title="Hỗ trợ" class="text-uppercase">Hỗ trợ</a>
                </p>
            </div>
        </div>
    </div>
</section>
