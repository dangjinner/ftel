@extends('public.layout')

@section('content')
<div class="single-banner">
   <img src="{{ v(theme::url('assets/images/dang ky online fpt.png'))}}" alt="Đăng ký online FPT" class="img-fluid">
   <div class="bg-menu-banner">
      <div class="container">
         <div class="row">
           @foreach($primaryMenu[0]->children()->get() as $menuItem)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <a href="{{ $menuItem->url }}" @if($loop->iteration == 2) class="active" @endif>{{ $menuItem->name }}</a>
                    </div>
            @endforeach
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
                  <li>Dịch vụ Online</li>
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
               <a class="productservice__img" href="{{ route('pages.playBox') }}">
               <img src="{{ v(theme::url('assets/images/icon/fpt play box.png'))}}" alt="FPT Play Box" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.playBox') }}" alt="FPT Play Box">FPT Play Box</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="{{ route('pages.play') }}">
               <img src="{{ v(theme::url('assets/images/icon/fpt play.png'))}}" alt="FPT Play" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.play') }}" alt="FPT Play">FPT Play</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="#">
               <img src="{{ v(theme::url('assets/images/icon/fpt fshare.png'))}}" alt="FPT Fshare" class="img-fluid">
               </a>
               <p>
                  <a href="#" alt="Net + Truyền hình FPT">Fshare</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="#">
               <img src="{{ v(theme::url('assets/images/icon/fpt fsend.png'))}}" alt="FPT Fsend" class="img-fluid">
               </a>
               <p>
                  <a href="#" alt="SOC 1Gbps">Fsend</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="#">
               <img src="{{ v(theme::url('assets/images/icon/fpt startalk.png'))}}" alt="FPT Startalk" class="img-fluid">
               </a>
               <p>
                  <a href="#" alt="Startalk">Startalk</a>
               </p>
            </div>
            <div class="single_testimonial text-center">
               <a class="productservice__img" href="#">
               <img src="{{ v(theme::url('assets/images/icon/fpt foxpay.png'))}}" alt="FPT Foxpay" class="img-fluid">
               </a>
               <p>
                  <a href="#" alt="FPT Foxpay">Foxpay</a>
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
                  <img alt="Introduce FPT" src="{{ v(theme::url('assets/images/icon/introduce fpt.png'))}}">
                  </span>
                  GIỚI THIỆU
               </h2>
            </div>
            <p>FPT Play Box+ 2020 là thiết bị TV Box đầu tiên ở Việt Nam sử dụng hệ điều hành Android TV 10 chính chủ từ Google, giúp người dùng có thể tìm kiếm nội dung và điều khiển thiết bị thông qua giọng nói, ngoài ra sản phẩm còn tích hợp thêm nhiều chức năng hiện đại như Chromecast, trợ lý ảo Google Assistant kết hợp cùng với kho nội dung giải trí đa dạng giúp nâng tầm trải nghiệm của cả gia đình.
            </p>
         </div>
         <div class="col-lg-6 col-12">
            <img alt="/" width="100%" src="{{ v(theme::url('assets/images/banner/fpt play.png'))}}">
         </div>
         <div class="col-lg-12 col-12" id="button" style="text-align: center;">
            <button onclick="openFunction()" style="border: 0px; background-color: red;border-radius: 5px; margin-top: 10px; padding: 5px 20px;    box-shadow: 6px 10px 5px #ccc; " ><p id="none" style="display: block;color: #fff">Xem thêm</p></button>

            <script type="text/javascript">
                  function openFunction(){
                      document.getElementById("detail-content").style.display = 'block' ;
                      document.getElementById("button").style.display = 'none' ;
                  }
            </script>
       </div>
      </div>
         <div class="row">
            <div class="col-lg-12 col-12">
               <div id="detail-content" style="display: none;margin-top:20px;line-height: 1.7; text-align: justify; font-size: 18px ">
                        <p style="font-size: 18px">Bạn đang rối như tơ vò vì khó lựa chọn một thiết bị đầu thu truyền hình chất lượng giữa vô vàn các loại thiết bị đang bày bán tràn lan trên thị trường như hiện nay. Bạn đã nghe đến <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a>  là bộ thiết bị chất lượng với nhiều ưu điểm vượt trội so với các dòng sản phẩm khác. Bạn chưa biết thực hư cùng những đánh giá cụ thể về chúng. Cùng chúng tôi điểm qua nhưng điểm mạnh của thiết bị này để lựa chọn tham khảo cho gia đình mình.
                        </p>
                        <h3 style="font-size: 30px;margin: 20px 0px;line-height: 1.5">
                           Tổng quan về FPT Play Box
                        </h3>
                        <p style="font-size: 18px">
                           Chắc hẳn bạn đã một lần nghe đến thiết bị <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a> khi có nhu cầu xem các bộ phim chuẩn HD. Đây là một thiết bị ngoại vi có tính năng biến tivi thường thành tivi thông minh mà không cần thao tác phức tạp. Nhờ vậy, bạn có thể xem tới hơn 100 các loại kênh truyền hình, các bộ phim bom tấn, tình cảm,... đến từ các nước châu Á,  u, Mỹ hay Hàn Quốc. Thậm chí những kênh phim có từ lâu đời như TVB hay KBS cũng đều có thể dễ dàng theo dõi được khi có FPT Play Box.
                           Bên cạnh đó, khi sử dụng thiết bị này, khách hàng sẽ nhận được thêm một gói  vụ miễn phí hoàn toàn để xem các kênh liên quan đến thể thao, bóng đá ở những giải đấu lớn không phát trên các kênh tivi thông thường. <br>
                           Kể từ khi sản phẩm này ra đời cho tới nay, những lo lắng thường trực xung quanh việc xem các bộ phim chuẩn HD hay 4K với độ phân giải cực chất lượng đã không còn tồn tại. Sản phẩm này có mức giá dao động tùy theo chất lượng sản phẩm, đôi khi chỉ vài trăm ngàn nhưng có những thiết bị có mức giá lên tới vài triệu. Tùy theo mục đích sử dụng cũng như nhu cầu của các thành viên trong gia đình mà bạn có thể lựa chọn sao cho phù hợp nhất. <br>
                           Chẳng hạn, có một số sản phẩm đầu thu xuất xứ Trung Quốc, Đài Loan với mức giá rẻ nhưng chỉ xem được vài lần là phải đóng thêm phụ phí hàng tháng hay mới xem được một thời gian ngắn đã bị lỗi, hỏng,... Có loại cũng lên tới 5 - 6 triệu nhưng đa số chỉ dao động ở mức hơn 2 triệu đồng mà vẫn đủ các chức năng xem phim, hỗ trợ 4K,... cho người dùng. <br>
                           <h3 style="margin-top: 10px;margin-bottom: 10px;font-size: 20px;font-weight: 600;line-height: 1.5">Các ưu thế nổi bật chỉ có tại FPT Play Box</h3> <br>
                           <p style="font-size: 18px">
                           Trước khi đi sâu vào những đánh giá của người dùng về thiết bị này, chúng ta cùng điểm qua các tính năng chung của sản phẩm để có cái nhìn tổng quát nhất khi lựa chọn.</p>
                        </p>

                        <p style="text-align: center;font-size: 30px;font-weight: bold;margin: 20px 0px;line-height: 1.5">Đánh giá sơ bộ về FPT Play Box</p>
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/pRMVF6JT5OU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p style="text-align: center;"> Những tính năng giải trí bất tận</p>
                        <br>
                        <p style="font-size: 18px">
                        Thiết bị <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a> được ưa chuộng và sử dụng cực kỳ phổ biến vì bản thân nó sở hữu nhiều ưu điểm rất nổi trội. Dù là các diễn đàn công nghệ, những người có kinh nghiệm sử dụng các thiết bị đầu thu lâu năm cũng không ngần ngại đánh giá cao dòng sản phẩm này. <br>
                        Đầu thu có thiết kế tương đối nhỏ gọn, trọng lượng nhẹ nên việc lắp đặt, vận chuyển và di động một quãng đường xa cũng không làm khó được người lắp đặt cũng như người dùng.
                        Sản phẩm còn cung cấp nhiều kênh truyền hình đặc sắc và miễn phí các gói cơ bản (hoàn toàn thay thế các dạng truyền hình cáp từ trước đó). Chẳng may bạn có bỏ lỡ một chương trình yêu thích thì có thể dễ dàng xem lại tại đây trong vòng từ 1 đến 2 ngày kể từ khi chương trình đó phát sóng.
                        Đường truyền ổn định, người dùng có thể xem phim HD Offline thông qua cổng USB 3.0 từ ổ cứng di động hoặc các thiết bị lưu trữ rời. Bên cạnh đó, trong Box còn có kho phim đồ sộ với nhiều thể loại đặc sắc đang được tìm kiếm rầm rộ trên mạng hiện nay như Kho Phim Lẻ, Kho Phim Bộ, Kho Phim HD 4K, …. mà không lo tình trạng giật, lag xảy ra. Nếu ngại sử dụng bàn phím điều khiển thì tính năng tích hợp giọng nói con người với FPT Voice Remote hiện cũng được trang bị kèm theo đầu thu này.
                        <br>
                        <h3 style="font-size: 30px;margin: 20px 0px;line-height: 1.5">8 điểm mạnh chỉ tìm thấy tại FPT Play Box</h3>
                        <img alt="FPT Play Box" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/play-box-detail-5.jpg'))}}">
                        <p style="text-align: center;margin-bottom: 20px;font-size: 18px">Bộ đầu thu ai ai cũng nên sở hữu </p>

                        Những ưu điểm được liệt kê dưới đây chính là minh chứng rõ ràng nhất để giải thích cho bất cứ ai đang thắc mắc tại sao sản phẩm này lại có “sức nóng” đến vậy. Cụ thể: <br>
                        <p style="margin: 10px 0px 0px 0px;font-weight: 600;">Về giao diện thiết kế </p>  <br>
                        <p style="font-size: 18px" >
                        Đặt lên bàn cân cùng các dòng Tivi Box khác thì có lẽ với thiết kế ôm gọn, nhẹ và cải tiến là một lợi thế của thiết bị này. Chúng có hình dạng khối vuông dẹt, màu đen và vỏ ngoài được bao bởi lớp mực nhám có in nổi logo FPT. Trọng lượng chỉ 150gram, cầm nắm trong lòng bàn tay giúp bạn mang chúng đi muôn nẻo con đường  mà không lo cồng kềnh hay mệt nhọc.
                        </p>
                        <br>
                         <p style="margin: 10px 0px 0px 0px;font-weight: 600;">Đánh giá khả năng tương thích </p> <br>

                        <img alt="FPT Play Box" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/play-box-detail-6.jpg'))}}">
                        <p style="text-align: center;">Sử dụng cùng nhiều ứng dụng khác</p>
                        <br>

                                <p style="font-size: 18px;">&nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp;Khi kết nối với Tivi: FPT Play Box cho phép kết nối với tivi thông qua 2 cổng là HDMI và AV. Dù tivi bạn dùng là đời cũ đã ngừng sản xuất thì vẫn có thể tương thích một cách dễ dàng. Bạn chỉ cần có đầy đủ các phụ kiện đi kèm với đầu thu là dây nguồn, cáp AV, cáp internet, cáp HDMI, pin, remote và sách hướng dẫn sử dụng sản phẩm là có thể sử dụng.</p> <br>
                                <p style="font-size: 18px;">&nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp;
                               Kết nối với <a href="/san-pham-dich-vu/internet-fpt" style="color: #034ea2">mạng Internet:</a>  Thiết bị có thể kết nối mạng bằng 2 cách là qua dây mạng và qua Wifi. Bản thân chúng cũng hỗ trợ kết nối với tốc độ cao và được nhận xét là cải tiến thông minh để hỗ trợ cả kết nối thường và kết nối với tốc độ siêu nhanh.</p>
                               <br>
                               <p style="font-size: 18px;">&nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp;
                               Kết nối qua cổng USB: FPT Play Box có thiết kế 3 cổng mà USB có thể liên kết. Nhờ đó, người dùng có thể kết nối USB, chuột có dây,... để dễ dàng sử dụng và điều khiển khi xem.<br><p>

                       <br>
                        <p style="margin-bottom: 10px; font-weight: 600; ">Cấu hình vượt trội của FPT Play Box</p>
                        <img alt="FPT Play Box" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/play-box-detail-7.jpg'))}}">
                        <p style="text-align: center;">Cấu hình mạnh mẽ</p>
                        <br>
                        <p style="font-size: 18px;">
                        Trong phiên bản mới nhất của <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a>, nhà sản xuất đã đầu tư hơn vào phần cứng giúp cấu hình đầu thu cao hơn, tương thích với hầu hết các đường truyền viễn thông cùng hiệu suất ổn định nhất. Nhờ vậy, thiết bị này luôn chạy rất mượt tại các ứng dụng và cổng media. Cổng cũng tương thích với nhiều dòng tivi hiện nay nên được đông đảo khách hàng đưa vào “ tầm ngắm” để xem xét lựa chọn. <br>
                        </p>
                        <p  style="margin-bottom: 10px;margin-top: 10px; font-weight: 600;">Về dịch vụ đi kèm mà FPT Playbox đang cung cấp</p>
                        <br>
                        <img alt="FPT Play Box" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/play-box-detail-8.jpg'))}}">
                        <p style="text-align: center;">Kho giải trí có một không hai của FPT Play Box</p>
                        <br>
                        <p style="font-size: 18px;">
                        Một trong những điểm nhấn của thiết bị này là chúng đi kèm các gói dịch vụ giá trị gia tăng hữu ích cho người dùng giữa thị trường tràn lan các sản phẩm nhưng còn nhiều thiếu sót. Dưới đây là một số dịch vụ đi kèm chỉ khi sử dụng FPT Play Box: </p><br>
                        <p style="font-size: 18px;"> &nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp; Có thể xem tới  hơn 150 kênh truyền hình trong nước và quốc tế </p> <br>
                        <p style="font-size: 18px;"> &nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp;  Điểm nổi bật dễ nhận thấy nhất ở thiết bị đầu thu này là tính năng hỗ trợ người dùng xem tới 150 kênh khác nhau. Chỉ với một chiếc đầu thu nhỏ bé có ngay vô số kênh phim trong tay và có thể xem lại bất cứ lúc nào trong vòng 72h kể từ lần phát sóng cuối cùng. Hiện các tivi box chưa được trang bị dịch vụ thông minh này.<br></p>

                        <p style="font-size: 18px;"> &nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp; Xem được truyền hình Việt Nam không giới hạn địa lý </p>
                        <br>
                        <p style="font-size: 18px;">
                        Điểm nhấn tiếp theo của sản phẩm là việc hỗ trợ bạn xem các kênh truyền hình Việt dù bạn có ở nước ngoài như Mỹ hay Châu  u không giới hạn. Nếu chỉ xem được các kênh truyền hình Việt qua máy tính hay Internet khi ở nước ngoài thì nay chuyện này đã trở nên dễ hơn bao giờ hết. Bạn có thể bỏ túi đầu thu FPT Play Box và mang theo bạn tới bất cứ đâu.
                        Xem phim từ ứng dụng FPT Play Box</p>
                        <br>
                        <img alt="FPT Play Box" style="width: 100%;margin-bottom: 20px" src="{{ v(theme::url('assets/images/film-bo.jpg'))}}">
                        <p style="text-align: center; font-size: 18px">Xem các bộ phim hấp dẫn nhất
                        <p style="font-size: 18px;">
                         Là một mọt phim Hàn, Thái hay Trung thì có lẽ niềm đam mê này chỉ có thể được thỏa mãn khi bạn sử dụng đầu thu của FPT. Bạn có thể thưởng thức bất cứ bộ phim nào trên ứng dụng này mà không cần tải hay chờ chúng được cập nhật mỗi ngày trên các kênh phim thông thường. Không chỉ vậy, xem trên tivi với màn hình rộng và sắc nét sẽ còn tuyệt vời và chân thực hơn rất nhiều. Ngoài ra, kho phim của thiết bị còn cập nhật đủ các loại phim lẻ hay phim bộ hot nhất tại thời điểm truy cập.
                        </p>
                         <br>
                        <p style="font-size: 18px;">&nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp; Xem truyền hình thể thao trực tiếp miễn phí, chìm đắm trong cảnh quay siêu thực </p> <br>
                        <p style="font-size: 18px;">
                        Không những được theo dõi các kênh thể thao hàng đầu, khi sử dụng FPT play, người dùng còn có thể xem trực tiếp các giải đấu bóng đá lớn như World Cup, giải Ngoại Hạng Anh, Tây Ban Nha,.... Đây thực sự là ưu thế mà khó ứng dụng nào theo kịp FPT trong tương lai gần. </p> <br>

                        <p style="font-size: 18px;">&nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp; Tổng hợp hàng loạt các ứng dụng giải trí mới nhất </p> <br>
                        <p style="font-size: 18px;">
                        Bên cạnh hàng loạt các ưu điểm trên, <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a> có tích hợp với kho thông tin giải trí siêu hot, phong phú và đa dạng các chương trình như hài, gameshow sức khỏe, kiến thức khoa học, đời sống,... <br>
                        Ngoài các dịch vụ hữu ích kèm theo đã nêu ở trên thì FPT Play Box còn đi kèm với kho thông tin giải trí khổng lồ, vô cùng đa dạng như chương trình phim hài, chương trình sức khỏe, kiến thức, Gameshow, giải trí,….
                        </p>
                        <br>
                        &nbsp;<i class="fas fa-check" style="font-size: 15px;color: #51b848"></i> &nbsp;Tiết kiệm chi phí khổng lồ cho khách hàng
                        <br>
                        <p style="font-size: 18px;">
                        Gói gọn chỉ trong một thiết bị siêu tiện lợi, nhỏ gọn <br>
                        Kể từ khi FPT Play Box ra mắt cho tới nay, sản phẩm thực sự đã hỗ trợ không nhỏ giúp khách hàng tiết kiệm một khoản chi phí đáng kể trong việc thanh toán các khoản phụ phí khi sử dụng truyền hình cáp truyền thống. Chỉ lần đầu tiên sử dụng phải trả phí, bạn sẽ được tận hưởng hơn 150 kênh truyền hình trong và ngoài nước kèm các bộ phim siêu hot và khó tìm thấy ở các kênh thông thường.<br>
                        </p>
                        <br>
                        <h3 style="font-size: 20px; font-weight: 600;margin-top: 20px;line-height: 1.5">  Lắp đặt FPT Play Box có khó hay không?  </h3> <br>
                        <p style="font-size: 18px;">
                        Như đã giới thiệu, sản phẩm có trọng lượng nhỏ gọn và dễ cầm nắm nên lắp đặt chúng không mất nhiều thời gian của bạn. Người dùng chỉ cần một vài thao tác đơn giản như cắm  dây nguồn Adapter rồi sau đó kết nối dây HDMI hoặc AV vào Internet. Bạn chỉ cần chờ trong giây lát thiết bị kích hoạt là có thể thỏa sức đam mê đón xem các bộ phim yêu thích của mình.<br></p>
                        <p style="font-size: 18px;">
                        Cũng như các thiết bị công nghệ số khác, FPT Play Box mặc dù mang theo nhiều ưu điểm nhưng cũng vẫn còn tồn tại đâu đó một số khuyết điểm cần khắc phục.  Dù vậy, so với các sản phẩm Tivi Box trên thị trường thì có lẽ khó ai sánh kịp FPT Play Box.  Đây thực sự là một điểm sáng của công nghệ Việt và cần được tiếp tục phát huy.<br></p>
                        <p style="font-size: 18px;">
                        Trên đây là một vài điểm mạnh của sản phẩm <a href="/san-pham-dich-vu/dich-vu-online/fpt-play-box" style="color: #034ea2">FPT Play Box</a> theo đánh giá khách quan từ người dùng. Hy vọng qua những thông tin chung, độc giả đã có cái nhìn chi tiết hơn về sản phẩm này và xem xét lựa chọn cho tổ ấm của mình trong thời gian tới.
                        </p>
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
<section class="feature news">
   <div class="container">
      <div class="block-title block__orange">
         <h2>
            <span class="block__image">
            <img alt="Đặc điểm nổi bật FPT" src="{{ v(theme::url('assets/images/icon/function fpt.png'))}}">
            </span>
            ĐẶC ĐIỂM
         </h2>
         <p>
            FPT Play Box+ giúp nâng cấp trải nghiệm giải trí gia đình với các tính năng nổi bật:
         </p>
      </div>
      <div class="feature__row row">
         <div class="col-lg-6 feature__col">
            <div class="feature__icon">
               <img alt="FTTH-f1.png" src="{{ v(theme::url('assets/images/icon/fptplaybox.png'))}}">
            </div>
            <div class="feature__text">Hơn 150 kênh truyền hình trong nước và quốc tế phong phú, đặc sắc như AXN, FOX Movies, FOX Sports, VTV, K+, Cartoon Network...</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon">
               <img alt="FTTH-f1.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-1.png'))}}">
            </div>
            <div class="feature__text">Giao diện đơn giản, thuần Việt, thân thiện và dễ sử dụng.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f5.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-2.png'))}}"></div>
            <div class="feature__text">Thưởng thức các giải thể thao độc quyền, hấp dẫn nhất như giải Ngoại Hạng Anh, Serie A, giải bóng rổ nhà nghề ABL, ATP World Tour... Với gói kênh K+.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f2.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-3.png'))}}"></div>
            <div class="feature__text">Không tốn chi phí truyền hình hàng tháng. Chỉ cần trả phí một lần cho thiết bị là đã có thể sở hữu được cả kho tàng giải trí tuyệt đỉnh.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f6.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-4.png'))}}"></div>
            <div class="feature__text">Tường thuật trực tiếp các nội dung giải trí đặc sắc khác như các liveshow ca nhạc, thời trang, sự kiện được nhiều người quan tâm.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f3.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-5.png'))}}"></div>
            <div class="feature__text">Tương thích với mọi loại nhà mạng, truyền hình xem lại trong 24h.  </div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f7.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-6.png'))}}"></div>
            <div class="feature__text">Kho phim đặc sắc, ấn tượng, đa dạng về thể loại từ Âu Mỹ, Hàn Quốc, Việt Nam, Thái Lan, Ấn Độ.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f4.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-7.png'))}}"></div>
            <div class="feature__text">Điều khiển giọng nói đi kèm sản phẩm.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f8.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-8.png'))}}"></div>
            <div class="feature__text">Hơn 5000+ ứng dụng, trò chơi từ Google Play Store và FPT Play Store.</div>
         </div>
         <div class="col-lg-6 feature__col">
            <div class="feature__icon"><img alt="FTTH-f9.png" src="{{ v(theme::url('assets/images/icon/fptplaybox-9.png'))}}"></div>
            <div class="feature__text">Trở thành trung tâm điều khiển các thiết bị thông minh trong hệ sinh thái Google Home.
            </div>
         </div>
      </div>
   </div>
</section>
<div class="tables tables--1">
   <div class="container tables__container">
      <div class="col-xs-12 text-left tables__inner">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td class="col-xs-5">Hệ điều hành</td>
                  <td class="col-xs-7">AndroidTV 10</td>
               </tr>
               <tr>
                  <td class="col-xs-5">CPU</td>
                  <td class="col-xs-7">AML S905X2</td>
               </tr>
               <tr>
                  <td class="col-xs-5">GPU</td>
                  <td class="col-xs-7">Mali G31</td>
               </tr>
               <tr>
                  <td class="col-xs-5">RAM</td>
                  <td class="col-xs-7">2GB</td>
               </tr>
               <tr>
                  <td class="col-xs-5">ROM</td>
                  <td class="col-xs-7">16GB</td>
               </tr>
               <tr>
                  <td class="col-xs-5">WIFI</td>
                  <td class="col-xs-7">Broadcom AP 6398S (2.4 &amp; 5.0 GHZ)</td>
               </tr>
               <tr>
                  <td class="col-xs-5">Bluetooth</td>
                  <td class="col-xs-7">5.0</td>
               </tr>
               <tr>
                  <td class="col-xs-5">Audio</td>
                  <td class="col-xs-7">5.1</td>
               </tr>
               <tr>
                  <td class="col-xs-5">USB</td>
                  <td class="col-xs-7">USB 3.0 &amp; USB 2.0</td>
               </tr>
               <tr>
                  <td class="col-xs-5">HDMI</td>
                  <td class="col-xs-7">2.1</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
<section class="tutorial">
   <div class="container ">
      <div class="block-title block__orange">
         <h2>
            <span class="block__image">
            <img alt="ico-price-fpt.png"  alt="price.png" src="{{ v(theme::url('assets/images/icon/price fpt.png'))}}">
            </span>
            GIÁ THIẾT BỊ
         </h2>
      </div>
      <div class="col-lg-12">
         <p class="text-uppercase">
            <img alt="icon-dola.png" src="{{ v(theme::url('assets/images/icon/icon dola fpt.png'))}}"> &nbsp;
            GIÁ sản phẩm: <strong>1.690.000 VNĐ</strong>
         </p>
         <p>
            ✔ Tặng 12 Tháng Gói Kênh Gia đình<br>
            ✔ Tặng 01&nbsp;Tháng Gói VIP<br><span class="font-">☆ ☆</span>
         </p>
         <p><b>Lưu ý:&nbsp;</b><br>
            - Bảo hành 12 tháng, 01 đổi 01 trong 30 ngày đầu nếu có lỗi phần cứng.<br>
            - Chính sách chăm sóc khách hàng 24/7 qua số hotline 1900 6600.
         </p>
      </div>
   </div>
</section>
@include('public.sections.support')
@include('public.sections.general.rv_cmt_for_pages_views')
@endsection
@section('script')
    @include('public.sections.general.rv_cmt_for_pages_scripts')
@endsection
