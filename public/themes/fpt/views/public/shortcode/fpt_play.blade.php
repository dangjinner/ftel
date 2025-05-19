<section class="searchcity">
    <div class="container">
        <div class="row">
            <div class="page-amount col-lg-4">
                <i class="fa fas far fa-map-marker"></i>Khu vực đang xem:
            </div>
            <div class="col-lg-4 styled-select">
                <select name="tinh1" id="tinh1" class="select-province">
                    <option value="">-- Chọn --</option>
                    @foreach ($provinces as $key => $value)
                    <option value="{{ url()->current() .'?'. 'locationId='.$key}}" {{ request()->get('locationId') ? ''
                        : ($key == $shortcode->provinces_id ? 'selected' : '') }} {{ request()->get('locationId') ==
                        $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</section>
<div>
    @foreach($services as $service)
    {!! $service->feature !!}
    @endforeach
</div>
<div id="package">
    <div class="bg container"><img src="/images/mua-goi/bg.png" alt=""></div>
    <div class="landing">
        <div id="menu-area"></div>
        <div class="container">
            <div id="max" class="wrapper">
                <div class="package-chanel">
                    <div class="package-title"><img
                            src="https://static.fptplay.net/static/img/share/promotion/01_11_2021/mua-goi_web-101-11-2021_00g35-14.jpg"
                            alt=""><span>Gói MAX</span>
                        <div class="package-label">
                            Khuyên dùng
                        </div>
                    </div>
                    <div class="package-content">
                        <div class="description is-more">
                            <h3> Gói dịch vụ phổ biến xem truyền hình, thể thao, phim truyện và giải trí trên FPT Play:
                            </h3>
                            <ul>
                                <li>Gần 200 kênh truyền hình trong nước và quốc tế (ngoại trừ K+)</li>
                                <li>Trực tiếp &amp; độc quyền: <ul type="disc">
                                        <li>Bóng đá Châu Âu (UEFA Champions League, UEFA Europa League, UEFA Europa
                                            Conference League, UEFA Youth League, UEFA Super Cup)</li>
                                        <li>Bóng đá Châu Á (World Cup 2022 Qualifiers và các giải đấu trực thuộc AFC)
                                        </li>
                                        <li>Bóng Rổ (﻿EuroLeague Basketball)</li>
                                        <li>Võ Thuật (PFL - Professional Fighters League, KOK - King of Kings, Combate
                                            Global và Bellator MMA)</li>
                                    </ul>
                                </li>
                                <li>Kho Phim Điện Ảnh</li>
                                <li>Ưu tiên xem trước Phim bộ phát song song</li>
                                <li>Đăng nhập và xem cùng lúc 3 thiết bị</li>
                            </ul>
                            <p> <span> * Ghi chú: Gói này không bao gồm các nội dung kênh K+ và HBO Go. Chỉ phát hành
                                    trên lãnh thổ Việt Nam. </span> </p>
                        </div><span class="see-more">
                            Ẩn bớt
                        </span>
                        <hr class="divide">
                        <div class="sp-area clearfix">
                            <ul class="left clearfix">
                                <li>
                                    <p>Các nền tảng hỗ trợ</p>
                                </li>
                                <li><img src="/images/browser.png"></li>
                                <li><img src="/images/smarttv.png"></li>
                                <li><img src="/images/apple.png"></li>
                                <li><img src="/images/android.png"></li>
                                <li><img src="/images/box.png"></li>
                                <li><img src="/images/huawei.png"></li>
                            </ul>
                            <p class="right"><a data-ela="Chọn gói Gói MAX" id="btn-buy-max" data-eca="ui"
                                    data-eac="click" class="btn-buy btn-cl2">chọn gói này</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="vip" class="wrapper">
                <div class="package-chanel">
                    <div class="package-title"><img
                            src="https://static.fptplay.net/static/img/share/promotion/01_11_2021/240x27601-11-2021_00g34-52.jpg"
                            alt=""><span>Gói VIP</span>
                        <!---->
                    </div>
                    <div class="package-content">
                        <div class="description">
                            <h3>Gói dịch vụ cao cấp xem truyền hình, thể thao, phim truyện và giải trí trên FPT Play:
                            </h3>
                            <ul>
                                <li> Đầy đủ quyền lợi Gói MAX &amp; SPORT </li>
                                <li> Kho phim HBO Go </li>
                                <li> Kho Phim Đặc Sắc và Phim Chiếu Rạp </li>
                                <li> Kho Giải Trí &amp; Phong Cách Sống (Yoga, Dancing, Skill …) </li>
                                <li> Không Quảng Cáo khi xem VOD </li>
                                <li> Đăng nhập và xem cùng lúc trên 5 thiết bị </li> (ngoại trừ HBO Go chỉ xem cùng lúc
                                2 thiết bị)
                            </ul>
                            <p> <span>(*) Ghi chú: Gói này không bao gồm các nội dung kênh K+. Chỉ phát hành trên lãnh
                                    thổ Việt Nam. </span> </p>
                        </div><span class="see-more">Xem thêm</span>
                        <hr class="divide">
                        <div class="sp-area clearfix">
                            <ul class="left clearfix">
                                <li>
                                    <p>Các nền tảng hỗ trợ</p>
                                </li>
                                <li><img src="/images/browser.png"></li>
                                <li><img src="/images/smarttv.png"></li>
                                <li><img src="/images/apple.png"></li>
                                <li><img src="/images/android.png"></li>
                                <li><img src="/images/box.png"></li>
                                <li><img src="/images/huawei.png"></li>
                            </ul>
                            <p class="right"><a data-ela="Chọn gói Gói VIP" id="btn-buy-vip" data-eca="ui"
                                    data-eac="click" class="btn-buy btn-cl2">chọn gói này</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sport" class="wrapper">
                <div class="package-chanel">
                    <div class="package-title"><img
                            src="https://static.fptplay.net/static/img/share/promotion/01_09_2021/mask-group-201-09-2021_11g17-38.png"
                            alt=""><span>Gói SPORT</span>
                        <!---->
                    </div>
                    <div class="package-content">
                        <div class="description">
                            <h3> Trực tiếp các sự kiện thể thao độc quyền trên FPT Play như: </h3>
                            <ul>
                                <li> UEFA Champions League 2021/24 </li>
                                <li> UEFA Europa League 2021/24 </li>
                                <li> UEFA Europa Conference League 2021/24 </li>
                                <li> UEFA Youth League 2021/24 </li>
                                <li> UEFA Super Cup 2021/24 </li>
                                <li> Giải Bóng Rổ Vô địch Châu Âu (EuroLeague 2020/23) </li>
                                <li> Giải Võ Thuật: PFL (Professional Fighters League), KOK (King of Kings), Combate
                                    Global và Bellator MMA </li>
                            </ul>
                            <p> <span> * Chỉ phát hành trên lãnh thổ Việt Nam. Gói này không bao gồm các giải đấu trên
                                    kênh K+ và 1 số kênh truyền hình khác. <br> * Mỗi tài khoản được đăng nhập tối đa 3
                                    thiết bị, nhưng chỉ xem cùng lúc tối đa 1 thiết bị. <br> * Một số dòng TV đời
                                    cũ có thể không đáp ứng yêu cầu kỹ thuật nên không xem được nội dung
                                    này.</span> </p>
                        </div><span class="see-more">Xem thêm</span>
                        <hr class="divide">
                        <div class="sp-area clearfix">
                            <ul class="left clearfix">
                                <li>
                                    <p>Các nền tảng hỗ trợ</p>
                                </li>
                                <li><img src="/images/browser.png"></li>
                                <li><img src="/images/smarttv.png"></li>
                                <li><img src="/images/apple.png"></li>
                                <li><img src="/images/android.png"></li>
                                <li><img src="/images/box.png"></li>
                                <li><img src="/images/huawei.png"></li>
                            </ul>
                            <p class="right"><a data-ela="Chọn gói Gói SPORT" id="btn-buy-sport" data-eca="ui"
                                    data-eac="click" class="btn-buy btn-cl2">chọn gói này</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kplus" class="wrapper">
                <div class="package-chanel">
                    <div class="package-title"><img
                            src="https://static.fptplay.net/static/img/share/promotion/01_09_2021/mask-group-101-09-2021_11g07-09.png"
                            alt=""><span>Gói K+</span>
                        <!---->
                    </div>
                    <div class="package-content">
                        <div class="description">
                            <h3>Gói K+:</h3>
                            <ul>
                                <li> Gồm các kênh: K+SPORT 1; K+SPORT 2; K+CINE; K+LIFE</li>
                                <li> Xem trực tiếp Ngoại Hạng Anh (EPL) và các giải thể thao hàng đầu thế giới trên 4
                                    kênh K+</li>
                            </ul>
                            <p> <span> * Chỉ phát hành trên lãnh thổ Việt Nam. <br> * Mỗi tài khoản được đăng nhập tối
                                    đa 3 thiết bị, nhưng chỉ xem cùng lúc tối đa 1 thiết bị. </span> </p>
                        </div><span class="see-more">Xem thêm</span>
                        <hr class="divide">
                        <div class="sp-area clearfix">
                            <ul class="left clearfix">
                                <li>
                                    <p>Các nền tảng hỗ trợ</p>
                                </li>
                                <li><img src="/images/browser.png"></li>
                                <li><img src="/images/smarttv.png"></li>
                                <li><img src="/images/apple.png"></li>
                                <li><img src="/images/android.png"></li>
                                <li><img src="/images/box.png"></li>
                                <li><img src="/images/huawei.png"></li>
                            </ul>
                            <p class="right"><a data-ela="Chọn gói Gói K+" id="btn-buy-kplus" data-eca="ui"
                                    data-eac="click" class="btn-buy btn-cl2">chọn gói này</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-error" class="modal modal--error modal-dcb--dark" data-v-a4678142="" style="z-index: 1017;">
        <div class="modal-header" data-v-a4678142="">
            <h3 class="modal-title" data-v-a4678142="">Thông báo</h3>
        </div>
        <div class="modal-body modal-dcb__content" data-v-a4678142="">

        </div>
        <div class="modal-footer" data-v-a4678142=""><button id="btn-submit" data-eca="ui" data-eac="click"
                data-ela="Đã Hiểu" class="btn-1 cta" data-v-a4678142="">
                Đã Hiểu
            </button></div><a class="btn-close-popup modal-close" data-v-a4678142=""><i class="material-icons"
                data-v-a4678142="">clear</i></a>
    </div>
</div>