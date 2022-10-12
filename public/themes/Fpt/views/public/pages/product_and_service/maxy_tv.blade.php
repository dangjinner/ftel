@extends('public.layout')

@section('content')
<div class="single-banner">
   <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online" class="img-fluid">
   <div class="bg-menu-banner">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.internetFpt') }}">Internet FPT</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
               <a href="{{ route('pages.maxyTv') }}"  class="active" >Truyền hình FPT</a> </a>
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
                   <li> <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a> </li>
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
                <a class="productservice__img" href="{{ route('pages.maxy') }}">
                <img src="{{ v(theme::url('assets/images/icon/iot fpt.png')) }}" alt="Gói kênh MAXY" class="img-fluid">
                </a>
                <p>
                   <a href="{{ route('pages.maxy') }}" alt="Gói kênh MAXY">Gói kênh MAXY</a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="productservice">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 col-12">
             <div class="block-title row block__orange">
                <h2>
                   <span class="block__image">
                   <img alt="Giới thiệu FPT" src="{{ v(theme::url('assets/images/icon/introduce fpt.png')) }}">
                   </span>
                   GIỚI THIỆU
                </h2>
             </div>
               <p style="font-size: 18px"><strong>Gói kênh MAXY </strong>sở hữu gần 200 kênh truyền hình trong nước và quốc tế với nhiều nội dung vượt trội, trong đó có 70 kênh chất lượng chuẩn HD. Không những vậy, <strong>gói kênh MAXY</strong> còn được bổ sung thêm 8 kênh nội dung nước ngoài, lần đầu tiên xuất hiện: Fox Family Movies, FX, Natgeo Wild, DreamWorks, Animax, Boomerang, BabyFirst, CBeebies. Đây là những kênh truyền hình quốc tế được yêu thích tại thị trường  Âu Mỹ và khu vực châu Á, khai thác các nội dung dành cho thiếu nhi và cả gia đình.</br>
                  Ngoài ra quý khách hàng sẽ được trải nghiệm miễn phí các nội dung khác tại các mục như Phim Truyện, Thiếu Nhi, KaraTivi, Thể Thao... hoặc tham gia chương trình trò chơi tương tác Chơi Hay Chia.
               </p>
          </div>
          <div class="col-lg-6 col-12">
             <img alt="Gói kênh MAXY FPT" width="100%" src="{{ v(theme::url('assets/images/shop/goi maxy fpt.jpg')) }}">
          </div>
          <div class="col-lg-12 col-12" id="button" style="text-align: center; margin-bottom: 10px;margin-top: 10px">
              <button onclick="openFunction()" style="border: 0px; background-color: red;border-radius: 5px; padding: 10px 20px;    box-shadow: 6px 10px 5px #ccc; " ><p id="none" style="display: block;color: #fff">Xem thêm</p></button>

                  <script type="text/javascript">
                        function openFunction(){
                            document.getElementById("detail-content").style.display = 'block' ;
                            document.getElementById("button").style.display = 'none' ;
                        }
                   </script>
          </div>
        <div class="col-lg-12 col-12">
         <div id="detail-content" style="display: none;margin-top:20px;line-height: 1.7;text-align: justify; ">
                 <p style="text-align:justify;font-size: 18px;font-weight: 600">4 lý do bạn nên chọn sử dụng truyền hình FPT cho năm 2021</p><br>
                <p style="font-size: 18px">
                  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  dần thay thế kênh truyền thống nhờ vào các tính năng ưu việt. Vì sao bạn nên chọn FPT chứ không phải kênh truyền hình khác, cùng xem 4 lý do sau.
               </p>
                <br>
               <p style="font-size: 18px;margin-bottom: 20px">
                  Truyền hình FPT được gọi là kênh tương tác, người dùng có thể điều khiển hai chiều bằng remote hoặc qua điều khiển giọng nói. FPT ứng dụng công nghệ IPTV cùng bộ đầu thu HD Box đã kết nối <a href="https://ftel.vn/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan" style="color:#0342a2"> internet cáp quang </a> là có thể xem phim, nghe nhạc, bóng đá thoải mái. Từ những ưu điểm vốn có, Công ty cổ phần Viễn thông FPT dần chiếm lĩnh thị trường truyền hình hiện đại. Nếu bạn còn mơ hồ, chúng tôi sẽ chỉ ra 4 lý do bạn nên chọn FPT để trở thành kênh truyền hình cho gia đình mình trong năm 2021.

               </p>

                </p>
                  <img alt="Truyền hình FPT" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/truyen-hinh-fpt-01.jpg'))}}">
                  <p style="text-align: center;"> Truyền hình FPT  là kênh truyền hình tương tác </p>
                  <br>

                  <p style="margin: 10px 0px 0px 0px;font-weight: 600;">Công nghệ truyền hình tương tác FPT năm 2021</p><br>
                  <p style="font-size: 18px;margin-bottom: 20px">
                  Từ tháng 8/2014, <a href="https://ftel.vn/" style="color:#034ea2"> FPT Telecom </a> chính thức đưa dịch vụ truyền hình trả tiền vào hoạt động. Kênh truyền hình tiền thân của FPT là OneTV. Bằng công nghệ truyền hình tương tác, người dùng được cấp phép các quyền điều khiển qua Remote. Thậm chí, người dùng có thể dùng giọng nói để sử dụng qua ứng dụng Remote FPT APP được tích hợp trên IPhone.
                  </p>
                  <img alt="Truyền hình FPT" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/truyen-hinh-fpt-02.jpg'))}}">
                  <br>
                  <p style="margin-bottom: 20px ;font-size: 18px">
                 Bạn có thể xem phim theo ý thích cùng chương trình xem lại xem đã qua trong 48 giờ. Bạn có thể điều khiển tivi khi đang ở công ty, bên ngoài đường và biết tivi đang chiếu chương trình gì. Kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  phát triển dựa vào nền tảng IPTV (Internet Protocol Television), FPT Play TV được dùng để giải mã tín hiệu truyền hình. <br>
                Bên cạnh các tính năng thông dụng của box HD, công nghệ này còn được công ty nâng cấp nhiều chức năng năng độc đáo khác.… đảm bảo trải nghiệm tuyệt vời cho người dùng. Không dừng lại ở đó, phần cứng FPT HD box rất mạnh mẽ, nên kênh truyền hình FPT xứng đáng là sự lựa chọn của bạn trong năm dịch Covid này.
                <br> </p>
                  <p  style="font-size: 18px;">
                    <strong style="margin-bottom: 10px"> Truyền hình FPT sở hữu kho phim HD miễn phí, đặc sắc và có bản quyền</strong><br><br>
                     Nếu cách đây 7 năm, các kênh truyền hình truyền thống tự hào vì cung cấp dịch dịch vụ kênh lên đến cả trăm. Thì trong năm 2021 này,  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  mang đến cho đa dạng kênh nhưng ưu việt hơn hẳn với con số 200 kênh. Và trong tương lai thì chắc chắn số lượng kênh truyền hình FPT sẽ tăng lên và chất lượng được nâng cao hơn trước.
                  </p>
                  <p style="font-size: 18px;">Xuất phát là công ty công nghệ, nghiễm nhiên các sản phẩm do FPT tạo ra luôn có chất lượng cao, phong phú về thể loại. Với danh sách hơn 200 kênh truyền hình trong nước nước và quốc tế, trong đó có 50 kênh tiêu chuẩn HD. Tất cả các nội dung của kênh vô cùng đa dạng, bao gồm giải trí, phim ảnh, thể thao, tin tức….. <br>
                  Một số kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  tiêu biểu có lượng người xem phổ biến như: VTVcab, VTC, K+, An Viên đều là kênh trong nước thì HBO, Star Movies, Disney Channel, Fox Sports cũng thuộc kênh nước ngoài nổi bật do FPT cung cấp. Tất cả các kênh truyền hình đều được thiết lập dựa trên tiêu chuẩn full HD, hình ảnh sắc nét. Nên dù bạn có dùng tivi màn hình phẳng cho dù khách hàng sử dụng tivi màn hình lớn 50 in trở lên vẫn đảm bảo độ rõ nét của hình ảnh.
                  Một ưu điểm đặc biệt khi bạn dùng đến kênh của FPT chính là độ trễ phát sóng của các kênh cực ít. Do đó, tín hiệu của kênh truyền hình FPT luôn nhanh hơn các kênh truyền thống và đối thủ khác từ 1 - 3 giây. <br>
                  <img alt="Truyền hình FPT" style="width: 100%;margin-bottom: 20px;margin-top:10px " src="{{ v(theme::url('assets/images/truyen-hinh-fpt-04.jpg'))}}">
                  </p>
                  <br>
                   <p style="margin: 10px 0px 0px 0px;font-size: 18px">Hiện tại,  <a href="https://ftel.vn/" style="color:#034ea2"> FPT Telecom </a> có cung cấp một số gói cho kênh truyền hình để người dùng lựa chọn. Trong đó, 2 gói được nhiều người lựa chọn nhất là cơ bản và mở rộng, cụ thể từng gói như sau:
                  </p> <br>
                  <div class="row" style="font-size: 18px;margin-bottom: 10px">
                      <div class="col-lg-4 col-12">
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Kênh tổng hợp <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Phim Truyện <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Giải trí <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Hoạt hình <br>
                      </div>
                       <div class="col-lg-4 col-12">
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Thể thao<br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;âm nhạc<br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Tin tức<br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Kênh địa phương<br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp;Kênh chuyên biệt<br>

                      </div>
                      <div class="col-lg-4 col-12">
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Gói Mở rộng gồm kênh Đặc sắc: <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; K+  <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Ngoại hạng Anh <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Và một số kênh thông dụng khác... <br>


                      </div>
                    </div>

                  <p style="font-size: 18px;font-weight: 600;margin-bottom: 10px">
                    Số lượng <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt/goi-kenh-maxy" style="color:#034ea2">gói Maxy</a>  phục vụ nhu cầu cá nhân hóa của người dùng
                  </p>
                  <p style="font-size: 18px;margin-bottom: 10px">
                    Có kho nội dung phong phú, kênh có đa dạng thể loại bao gồm các hình thức giải trí, ca múa nhạc, phim truyện, thể thao…. Người dùng có thể thoải mái lựa chọn nội dung theo như gợi ý của kênh truyền hình hoặc yêu cầu. Kênh truyền hình FPT có các ứng dụng sẽ làm bạn hài lòng như sau:
                  </p>
                  <p style="font-size: 18px;font-weight: 600">Ứng dụng phim truyện</p>
                  <br>

                  <p style="font-size: 18px">
                      Ứng dụng Phim truyện tại dịch vụ  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  có thể nói là thế giới nghệ thuật thu nhỏ. Với hàng ngàn bộ phim điện ảnh được phát sóng mỗi ngày, cùng kho phim truyền hình đặc sắc của trong nước và quốc tế. Mỗi thể loại phim của kênh luôn được cập nhật liên tục, đặc biệt kênh có nhiều ngôn ngữ, thực hiện phụ đề và thuyết minh trong phim.
                  </p>
                 <br>
                  <img alt="Truyền hình FPT" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/truyen-hinh-fpt-05.jpg'))}}">
                  <p style="margin: 10px 0px 10px 0px;font-weight: 600;font-size: 18px">Kho phim của kênh truyền hình FPT  được sắp xếp theo các đầu mục để người dùng dễ dàng lựa chọn. Cụ thể như sau: </p>
                  <div class="row" style="font-size: 18px">
                      <div class="col-lg-6 col-6">
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Tâm lý<br>
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Gia đình<br>
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bộ  u Mỹ<br>
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bộ Hàn Quốc<br>
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bộ Hoa ngữ<br>
                              <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bộ Việt Nam…<br>
                      </div>
                       <div class="col-lg-6 col-6">
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Phim mới nhất <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Phim nên xem   <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Phim xem nhiều nhất<br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bom tấn <br>
                          <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Hành động <br>

                      </div>
                    </div>
                  <br>
                  <p style="font-size: 18px">
                       Ngoài ra, các bộ phim điện ảnh chiếu rạp bom tấn mới nhất cũng có mặt tại  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  người: Phim Hollywood, Việt Nam thông qua các yêu cầu của Fim+, Danet.<br>
                  </p>
                  <p  style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Ứng dụng thiếu nhi</p>
                  <p style="margin-bottom: 10px;margin-top: 10px;font-size: 18px">Ứng dụng thiếu nhi của kênh trước khi công chiếu sẽ chọn lọc kỹ lưỡng với mục đích mang đến giải và giáo dục cao cho trẻ nhỏ. Các bộ phim hoạt hình mang tính nhân văn, chương trình ca nhạc, kể chuyện, chương trình học Tiếng Anh…..rất dễ hiểu, phù hợp với thiếu nhi. Tất cả chương trình đều có bản thuyết minh bằng tiếng Việt, đảm bảo các bé vừa học, vừa chơi hiệu quả nhất.
                  </p>
                  <br>
                  <p style="font-size: 18px;font-weight: 600">Ứng dụng giải trí</p>
                  <br>
                  <p style="margin-bottom: 10px;margin-top: 10px;font-size: 18px">Nhu cầu thưởng thức và giải trí của khán giả ngày càng cao, nên FPT đã phát triển cho kênh truyền hình nội dung cực hấp dẫn. Các show âm nhạc trong và ngoài nước, TVshow thực tế, sân khấu hay hài kịch….. Tin chắc, những tiết mục vui nhộn trong chương trình sẽ cho bạn khoảnh khắc thư giãn nhẹ nhàng.
                  </p>
                  <p style="font-size: 18px;font-weight: 600;margin-bottom: 10px">Ứng dụng sự kiện</p>
                  <p style="font-size: 18px;text-align: left;" >
                  Ứng dụng sự kiện được kênh phát sóng trực tiếp và trải qua nhiều giai đoạn chọn lọc chất lượng. Các liveshow giải trí do kênh phát như: <br>
                      &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Ca nhạc Mỹ Tâm, Hiền Hồ, Ưng Hoàng Phúc,Đan Trường, Erik….<br>
                      &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Các đại hội nhạc EDM<br>
                      &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Các chương trình truyền hình<br>
                      &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Các trận đấu thể thao (Ngoại hạng Anh, AFF Cup, Futsal…)<br>
                      &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Các chương trình giải trí, kịch tương tác… <br>
                      </p>
                  <br>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Ứng dụng Thể thao</p>

                  <p style="font-size: 18px">Ứng dụng thể thao sẽ cung cấp cho bạn những tin tức nóng nhất trong giới này. Các cuộc đối đầu bóng đá đỉnh cao, trận cầu lông, quần vợt sắp diễn ra….của Việt Nam và thế giới. Ứng dụng thể thao được phân thành nhiều chuyên mục để người dùng lựa chọn: <br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bóng đá<br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Bản tin thể thao<br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Tạp chí chuyên đề <br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Tennis & Tốc độ<br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Thể thao tổng hợp<br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Đối kháng <br>
                    &nbsp; &nbsp; <i class="fas fa-check" style="font-size: 10px;color: #51b848"></i> &nbsp; Hướng dẫn tập luyện<br>

                  <p>
                    <img alt="Truyền Hình FPT" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/truyen-hinh-fpt-06.jpg'))}}">
                  <p style="margin-top: 10px; font-weight: 600;font-size: 18px;margin-bottom: 10px;">Các ứng dụng trực tuyến</p>

                  <p style="font-size: 18px"> <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  sẽ phù phép chiếc tivi của gia đình bạn trở thành một ứng dụng trực tuyến đa chức năng. Bạn có thể xem video qua kênh Youtube, hát karaoke, đọc các kênh báo điện tử trực tuyến….cùng nhiều ứng dụng hiện đại khác.
                  </p>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng tương tác cực kỳ nhạy bén
                   </p>

                  <p style="font-size: 18px">STính năng tương tác của kênh FPT cực kỳ nhạy bén, tạo ra sự mới lạ trong kênh truyền hình mà nhà cung cấp khác không làm được. Chi tiết các tính năng tại kênh truyền hình FPT như sau:
                  </p>

                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tùy chọn góc nhìn  (Multi-cam)
                 </p>
                  <p style="font-size: 18px">FPT phát triển và trang bị cho kênh truyền hình tính năng độc đáo là xem nhiều góc quay (Multi-cam). Với tính năng này, người dùng được phép lựa chọn những các góc quay mà bạn yêu thích để có thể thưởng thức chương trình nào đó vui vẻ nhất. Với nhiều góc nhìn các chương trình ca nhạc, gameshow thời trang sẽ được tận mắt trải nghiệm cách tương tác thú vị này.
                  </p>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Mở két tương tác trực tiếp với người dẫn chương trình
                   </p>
                  <p style="font-size: 18px">Ở một cấp độ tương tác thực này, người dùng hoàn toàn có thể bước vào thế giới giải trí qua chiếc tivi. Không chỉ đi sâu vào nội dung của chương trình, người dùng còn được giao tiếp với người dẫn chương trình dù đang ngồi đối diện tivi. Chỉ bằng 1 chiếc remote, người chơi có thể trả lời câu hỏi và nhấp nút lệnh là xong câu trả lời của mình. Và tại Việt Nam, chỉ có duy nhất kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  sử dụng công nghệ này cho hệ thống dịch vụ truyền hình tương tác.

                  </p>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng giám sát trẻ em
                  </p>
                  <p style="font-size: 18px">Kênh truyền hình chắc chắn sẽ giúp trẻ phát triển nhận thức về thế giới quan. Tuy nhiên, nếu bạn không kiểm soát thời gian và những gì mà các bé đang xem sẽ làm mất đi giá trị kiến thức. Bởi khả năng cao kênh mà bé đang xem không phù hợp với lứa tuổi và nội dung không được lành mạnh. <br>
                    Vậy thì bạn hãy yên tâm về vấn đề này khi đăng ký kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a> . Với tính năng giám sát trẻ em, người dùng được phép thiết lập thời gian xem của bé. <br>
                    Đồng thời, bạn cũng có thể giới hạn nội dung xem các chương trình thiếu nhi để yên tâm làm những công việc khác.
                  </p>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng EPG </p>
                  <p style="font-size: 18px">EPG là tính năng lịch phát sóng thông minh. Bạn có thể dùng EPG để tra cứu lịch phát sóng của các chương trình, sự kiện. Như vậy, người dùng sẽ không bỏ lỡ những nội dung mà mình đang yêu thích, đây cũng là lý do bạn nên chọn kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a>  cho năm 2021.

                  </p>
                    <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng xem lại
                    </p>
                  <p style="font-size: 18px">Bạn có thể xem lại bất cứ chương trình nào của kênh trong vòng 48h đồng hồ. Từ đó, người dùng sẽ không phải lệ thuộc quá nhiều vào lịch phát sóng của các kênh, đồng thời thời gian của bạn cũng chủ động hơn.

                  </p>
                   <br>
                  <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng tùy chỉnh nâng cao
                  </p> <br>
                  <p style="font-size: 18px">
                    Các chương trình giải trí quốc tế luôn được FPT cập nhật thường xuyên để phục vụ người xem. Với chương trình này, bạn có thể sử dụng tùy chọn thuyết minh hoặc giữ nguyên bản gốc hay chọn ngôn ngữ mà bạn yêu thích. Bên cạnh đó, người dùng có thể điều chỉnh kích thước, màu sắc và cả vị trí của phụ đề một cách dễ dàng.

                  </p>
                   <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Danh sách kênh cá nhân
                  </p> <br>
                  <p style="font-size: 18px">
                    Danh sách kênh cá nhân có đến 30 kênh bạn yêu thích được tổng hợp từ số lượng truy cập nhiều nhất. Nhờ đó mà bạn không cần phải vất vả tìm kênh muốn xem trong tổng 30/200 kênh  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">truyền hình FPT</a> .
                  </p>
                   <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Tính năng PIP & MOSAIC
                  </p> <br>
                  <p style="font-size: 18px">
                    PIP & MOSAIC là tính năng xem nhiều kênh cùng lúc. Đối với công nghệ này chỉ có trên các dòng tivi thông minh nhất hiện nay. Với PIP & MOSAIC, người dùng có thể trải nghiệm tối đa 16 kênh khác biệt nhau trong cùng một lúc.
                  </p>
                   <p style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;font-size: 18px">Điều khiển bằng giọng nói
                  </p> <br>
                  <p style="font-size: 18px">
                    Smartphone với ứng dụng FPT Remote cung cấp cho người dùng tính năng điều khiển bằng giọng. Ứng dụng này cũng đã có mặt trên CH Play và App Store, nay cũng được kênh truyền hình FPT áp dụng để cho người dùng sự thuận tiện khi xem tivi.
                  </p>
                  <p style="font-size: 18px">
                   <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  ra đời như một cuộc cải cách và dần thay thế thói quen xem truyền hình truyền thống của người dùng. Bằng công nghệ IPTV (Internet Protocol Television) tạo kênh truyền hình tương tác 2 chiều giúp người dùng thao tác dễ dàng khi xem tivi. Hơn hết, FPT có hơn 200 kênh trong và ngoài nước, film tiêu chuẩn HD, tính năng tua lại, giám sát trẻ em...sẽ làm bạn cảm thấy an tâm và hài lòng khi lắp đặt kênh truyền hình cho năm 2021.
                </p>
                  <iframe width="100%" height="500" src="https://www.youtube.com/embed/AMI-W9hh0AU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <br>
                  <div class="col-lg-12 col-12" style="text-align: center;">
                     <button onclick="closeFunction()" style="text-align: center;border: 0px;background: #f37021;border-radius: 30px;padding: 10px 50px 10px 50px;color: #fff;">Rút gọn</button>
                     <script type="text/javascript">
                          function closeFunction(){
                         document.getElementById("detail-content").style.display = 'none' ;
                         document.getElementById("button").style.display = 'block' ;
                         $('html, body').animate({
                              scrollTop: 0
                           }, 600);
                     }
                     </script>
                  </div>

            </div>
      </div>
       </div>
    </div>
 </section>
 <section class="feature feature--gray">
    <div class="container">
    <div class="block-title row block__orange">
       <h2>
          <span class="block__image">
          <img alt="ico-fpt.png" src="{{ v(theme::url('assets/images/icon/function fpt.png')) }}">
          </span>
          MỤC - TÍNH NĂNG
       </h2>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function tv fpt.png'))}}"> Truyền hình
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-180.png" src="{{ v(theme::url('assets/images/icon/tv 180 fpt.png')) }}">
                </div>
                <div class="col-sm-10">
                   <p>Với gần 200 kênh truyền hình trong nước và quốc tế với nhiều nội dung vượt trội, trong đó có 70 kênh chất lượng chuẩn HD, khách hàng có thể dễ dàng lựa chọn các nội dung khác nhau phù hợp với sở thích. Các kênh truyền hình được chia thành các nhóm như Nhóm kênh Thiếu nhi: Cbeebies, Cartoon Network HD, Disney Junior, Disney Channel...<br><br>
                      Nhóm kênh phim truyện Hollywood, Âu Mỹ, Châu Á: HBO, FOX Movies, Red by HBO, Cinemax, Fox Family Movies...<br><br>
                      Nhóm kênh Giải trí tổng hợp (thể thao, thời trang, âm nhạc...): AXN HD, Fox HD, Discovery, Blue Ant Extreme, Fox Sport HD...<br><br>
                      Ngoài ra  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  còn cung cấp gói kênh K+ với nhiều nội dung thể thao, giải trí hấp dẫn.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/icon tv smart fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <strong>Những tính năng thông minh khi xem truyền hình:</strong>
                   <ul class="no-pad-l" style="padding-top:10px;">
                      <li><strong>Truyền hình xem lại:</strong> Xem lại chương trình đã phát sóng trước đó lên đến 48h.</li>
                      <li><strong>Lịch phát sóng điện tử EPG: </strong> Xem lịch và cài đặt hẹn giờ cho chương trình muốn xem.</li>
                      <li><strong>Tùy chỉnh ngôn ngữ:</strong> Cho phép người dùng bật /tắt thuyết minh, phụ đề tiếng Việt hoặc ngôn ngữ gốc của nhiều kênh truyền hình quốc tế.</li>
                      <li>
                         <meta>
                         <b id="docs-internal-guid-3a78f20a-904e-8d7b-6d9c-29e7306b4805">Giám sát nội dung trẻ em: </b>Giúp cha mẹ dễ dàng thiết lập và quản lý nội dung xem của trẻ theo từng độ tuổi thông qua mật khẩu.
                      </li>
                      <li><strong>Điều khiển Tivi bằng giọng nói:</strong> Cài đặt app FPT Remote trên thiết bị di động Android hoặc iOS có kết nối internet để điều khiển tivi qua màn hình cảm ứng và giọng nói. FPT Remote có thể thay thế hoàn toàn các chức năng của điều khiển truyền thống.</li>
                      <li><strong>Lưu yêu thích:</strong> là tính năng giúp khán giả có thể lưu các kênh, các chương trình mà mình yêu thích.</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function film fpt.png'))}}"> MỤC PHIM TRUYỆN
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-180.png" src="{{ v(theme::url('assets/images/icon/tv book fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Kho phim truyện khổng lồ với hàng nghìn đầu phim điện ảnh và truyền hình trong và ngoài nước.</p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/tv remote fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Đa dạng và đặc sắc từ nội dung tới thể loại, được phân nhóm để tiện tìm kiếm và theo dõi.</p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/tv child fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Cập nhật nhanh chóng, hàng ngày các bộ phim hot, đa dạng thể loại từ hành động, kinh dị, tâm lý, hoạt hình, tài liệu,... đến bộ Hàn Quốc, bộ Việt Nam, bộ Hoa Ngữ, bộ Âu Mỹ…</p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/tv children monitor fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Tính năng giám sát trẻ em giúp quản lý nội dung an toàn cho trẻ, tính năng tùy chọn ngôn ngữ thuyết minh, phụ đề…</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/tv children monitor fpt.png'))}}"> MỤC THIẾU NHI
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-lg-4 col-md-4 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-180.png" src="{{ v(theme::url('assets/images/icon/tv children 1 fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Nhiều chương trình vui, bổ ích giúp các bé vừa giải trí lại vừa có thể học hỏi và khám phá những điều tốt đẹp từ thế giới xung quanh mình.</p>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/tv children 3 fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Các chương trình nước ngoài có thuyết minh tiếng Việt dành cho các bé.</p>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-smart.png" src="{{ v(theme::url('assets/images/icon/tv children 2 fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Nội dung mới lạ, hấp dẫn như phim, ca nhạc, kể chuyện, học tiếng Anh, học điều hay…</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function sport fpt.png'))}}">  MỤC THỂ THAO
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-frend.png" src="{{ v(theme::url('assets/images/icon/tv frend fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p> <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  hữu trọn vẹn bản quyền các giải đấu thuộc khuôn khổ Liên đoàn bóng đá AFC 2021 – 2024, Serie A mùa giải 2018-2021. Ngoài ra  <a href="https://ftel.vn/san-pham-dich-vu/truyen-hinh-fpt" style="color:#034ea2">Truyền hình FPT</a>  còn có nhiều giải thể thao hấp dẫn như giải bóng rổ châu Âu EuroLeague, giải bóng đá FA Cup... cùng nhiều chương trình thể thao hấp dẫn khác.</p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-yoga.png" src="{{ v(theme::url('assets/images/icon/tv yoga fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Cập nhật những tin tức mới nhất về thể thao tại chuyên mục Bản tin và Tạp chí chuyên đề.</p>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-live.png" src="{{ v(theme::url('assets/images/icon/tv live fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Tiện ích với ứng dụng Hướng dẫn tập luyện, gồm các video hướng dẫn của các chuyên gia để người xem có thể chủ động luyện tập tại nhà.</p>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-football.png" src="{{ v(theme::url('assets/images/icon/tv football fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Tham gia tương tác dự đoán bóng đá nhận thưởng giá trị.</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="" src="{{ v(theme::url('assets/images/icon/function music fpt.png'))}}">
             MỤC GIẢI TRÍ
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-music.png" src="{{ v(theme::url('assets/images/icon/tv music fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Kho chương trình giải trí đáp ứng nhu cầu của mọi lứa tuổi, vùng miền với các đầu mục TV Show, Ca nhạc, Hài kịch và Sân khấu.</p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-rada.png" src="{{ v(theme::url('assets/images/icon/tv rada fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Không chỉ theo kịp lịch phát của các nhà đài để mang tới khán giả những chương trình truyền hình của Việt Nam, Hàn Quốc, Trung Quốc, Âu –Mỹ mới lạ và hấp dẫn nhất, chuyên mục còn đi sâu khai thác mảng nội dung truyền thống với cải lương, đờn ca, quan họ và chèo.</p>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function tv fpt.png'))}}"> MỤC XEM PHIM THEO YÊU CẦU GALAXY PLAY, DANET
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-12 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-1">
                   <img alt="tv-image.png" src="{{ v(theme::url('assets/images/icon/tv image fpt.png'))}}">
                </div>
                <div class="col-sm-11">
                   <p>Với mục Galaxy Play và Danet, khán giả sẽ được lựa chọn kho chương trình theo yêu cầu với các nội dung phim bom tấn Hollywood, phim Việt Nam chiếu rạp mới nhất và các gói phim linh động theo tháng.</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function tv fpt.png'))}}"> MỤC TRỰC TIẾP
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-12 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-1">
                   <img alt="tv-180.png" src="{{ v(theme::url('assets/images/icon/tv 180 fpt.png'))}}">
                </div>
                <div class="col-sm-11">
                   <p>Nơi trực tiếp các sự kiện giải trí, thể thao hấp dẫn trong nước lẫn quốc tế như ca nhạc, thời trang, bóng đá... Khách hàng theo dõi trực tiếp tại nhà và tận hưởng không khí chân thực nhất như đang có mặt tại sự kiện.</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="feature__row row">
       <div class="col-xs-12 col-sm-12 row feature__title">
          <h3 class="text-uppercase">
             <img alt="function-tv" src="{{ v(theme::url('assets/images/icon/function stoge fpt.png'))}}"> KHO  ỨNG DỤNG
          </h3>
       </div>
       <div class="col-xs-12 col-sm-12 row feature__content">
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-desk.png" src="{{ v(theme::url('assets/images/icon/tv desk fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Tích hợp nhiều ứng dụng tiện tích được người dùng ưa chuộng như Youtube, nghe nhạc trực tuyến, đọc báo online, Fadio…
                      Thỏa sức ca hát hàng ngàn ca khúc Karaoke với ứng dụng KaraTivi.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-md-6 feature__item col-sm-12">
             <div class="row">
                <div class="col-sm-2">
                   <img alt="tv-app.png" src="{{ v(theme::url('assets/images/icon/tv app fpt.png'))}}">
                </div>
                <div class="col-sm-10">
                   <p>Cài đặt app FPT Remote trên thiết bị di động Android hoặc iOS có kết nối internet để điều khiển tivi qua màn hình cảm ứng và giọng nói. FPT Remote có thể thay thế hoàn toàn các chức năng của điều khiển truyền thống.</p>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <div class="tables">
    <div class="container">
       <div class="col-xs-12 row ">
          <div class="block-title row block__orange " style="">
             <h2>
                <span class="block__image">
                <img alt="" src="{{ v(theme::url('assets/images/icon/price fpt.png'))}}">
                </span>
                CHÍNH SÁCH BÁN HÀNG
             </h2>
          </div>
          <div class="table-responsive">
             <table class="table table-price" width="100%">
                <tbody>
                   <tr>
                      <td bgcolor="#f37021" style="padding:10px 5px;" width="20%">
                         <div align="center" style="color:#fff;"></div>
                      </td>
                      <td bgcolor="#f37021" style="padding:10px 5px;" width="20%">
                         <div align="center" style="color:#fff;"><strong>Phí hòa mạng</strong></div>
                      </td>
                      <td bgcolor="#f37021" style="padding:10px 5px;" width="40%">
                         <div align="center" style="color:#fff;"><strong>Cước/ tháng</strong></div>
                      </td>
                      <td bgcolor="#f37021" style="padding:10px 5px;" width="20%">
                         <div align="center" style="color:#fff;"><strong>Khuyến mại thêm</strong></div>
                      </td>
                   </tr>
                   <tr>
                      <td bgcolor="#f6ad82"><strong>Trả sau</strong></td>
                      <td bgcolor="#f8d6c2">
                         <div align="center">500,000</div>
                      </td>
                      <td bgcolor="#fbeae0">Hà Nội / TP. Hồ Chí Minh: 100,000<br>
                         Tỉnh (bao gồm Củ Chi): 80,000
                      </td>
                      <td bgcolor="#fef3ee"></td>
                   </tr>
                   <tr>
                      <td bgcolor="#f6ad82"><strong>Trả trước 6 tháng</strong></td>
                      <td bgcolor="#f8d6c2">
                         <div align="center">Miễn phí</div>
                      </td>
                      <td bgcolor="#fbeae0"></td>
                      <td bgcolor="#fef3ee"></td>
                   </tr>
                   <tr>
                      <td bgcolor="#f6ad82"><strong>Trả trước 12 tháng</strong></td>
                      <td bgcolor="#f8d6c2">
                         <div align="center">Miễn phí</div>
                      </td>
                      <td bgcolor="#fbeae0"></td>
                      <td bgcolor="#fef3ee">
                         <div align="center">+ 1 tháng</div>
                      </td>
                   </tr>
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
@include('public.sections.support')
@endsection
