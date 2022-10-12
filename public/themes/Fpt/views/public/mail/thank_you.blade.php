@extends('public.layout')
@section('css')
<style>
@media (max-width: 767px) {
    .progress li:nth-child(2) {
        background: #f37021;
        color: #f37021;
        width: 70%;
        margin-top: 5px;
        display: flex;
        }
}
@media(min-width:768px) and (max-width:1024px)
{
    .progress li:nth-child(2) {
        background: #f37021;
        width: 70%;
        margin-bottom: 5px;
    }
}
 </style>
@endsection
@section('content')
<div class="header-banner">
    <img src="{{ v(Theme::url('assets/images/dang ky online fpt.png')) }}" alt="">
</div>
<main class="col-md-8 col-md-offset-2 center">
    <section class="steps">
       <ul class="progress">
         <li class="active"><i class="fas fa-building"></i><a href="#">Kiểm tra hạ tầng</a></li>
         <li class="active"><i class="fas fa-file-signature white"></i><a class="white" href="#">Hoàn tất đăng ký</a></li>
      </ul>
    </section>

    <section class="container">
       <div class="jumbotron text-center">
           <h1 class="display-3">Thank You!</h1>
           <i class="fa fa-check size-xl"></i>
           <p class="lead"><strong>Bạn đã đăng ký thành công. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất có thể.<br> Thank you who have used the services of <a href="https://ftel.vn/" style="color: #034ea2;"> FPT Telecom!</a></strong> </p>
           <hr>
           <p>
            Hotline: <a href="tel:0978888659">0978888659</a> -  <a href="https://ftel.vn/">Back to Home</a>
           </p>
           
           <p class="lead" style="margin-top: 10px;">
             <a class="btn btn-primary btn-sm" href="https://ftel.vn/" role="button"><i class="fa fa-home" ></i></a>
           </p>
         </div>
    </section>
    <!-- <section class="formsignin">
       <div class="container">
          <div class="row">
             
             <div class="block-title block__orange">
                <h2>
                <span class="block__image">
                   <i class="fas fa-user-alt"></i>
                </span>
                THÔNG TIN KHÁCH HÀNG
                </h2>
             </div>
             
          </div>
          <div class="row formsignin__row">
             <div class="col-lg-6">
                <div class="col-lg-12 formsignin__col ">
                   <label class="bold" for="exampleFormControlSelect1">Thông tin chủ hợp đồng:</label>
                </div>
                <div class="row row-full ">
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Họ và tên <i class="star">*</i></label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ và tên">
                   </div>
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Số điện thoại <i class="star">*</i></label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                        <input type="number" class="form-control" placeholder="Số điện thoại" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                </div>
             </div>
             <div class="col-lg-12">
                <div class="row">
                   <div class="col-lg-10 formsignin__col">
                      <p>
                         (*) Vui lòng điền đủ thông tin này
                      </p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>

    <section class="formsignin">
       <div class="container">
          <div class="row">
             
             <div class="block-title block__orange">
                <h2>
                <span class="block__image">
                   <i class="fas fa-map-marked-alt"></i>
                </span>
                THÔNG TIN ĐỊA CHỈ LẮP ĐẶT
                </h2>
             </div>
             
          </div>
          <div class="row formsignin__row">
             <div class="col-lg-6">
                <div class="row">
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Tỉnh/Thành phố</label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                      <select class="form-control" id="exampleFormControlSelect1">
                         
                         <option value="HNI">Hà Nội</option>
                         <option value="HCM">Hồ Chí Minh</option>
                         
                         <option value="HGG">Hà Giang</option>
                         <option value="CBG">Cao Bằng</option>
                         <option value="BKN">Bắc Kạn</option>
                         <option value="TQG">Tuyên Quang</option>
                         <option value="LCI">Lào Cai</option>
                         <option value="DBN">Điện Biên</option>
                         <option value="LCU">Lai Châu</option>
                         <option value="SLA">Sơn La</option>
                         <option value="YBN">Yên Bái</option>
                         <option value="HBH">Hòa Bình</option>
                         <option value="TNN">Thái Nguyên</option>
                         <option value="LSN">Lạng Sơn</option>
                         <option value="QNH">Quảng Ninh</option>
                         <option value="BGG">Bắc Giang</option>
                         <option value="PHO">Phú Thọ</option>
                         <option value="VPC">Vĩnh Phúc</option>
                         <option value="BNH">Bắc Ninh</option>
                         <option value="HDG">Hải Dương</option>
                         <option value="HPG">Hải Phòng</option>
                         <option value="HYN">Hưng Yên</option>
                         <option value="TBH">Thái Bình</option>
                         <option value="HNM">Hà Nam</option>
                         <option value="NDH">Nam Định</option>
                         <option value="NBH">Ninh Bình</option>
                         <option value="THA">Thanh Hóa</option>
                         <option value="NAN">Nghệ An</option>
                         <option value="HTH">Hà Tĩnh</option>
                         <option value="QBH">Quảng Bình</option>
                         <option value="QTI">Quảng Trị</option>
                         <option value="HUE">Thừa Thiên Huế</option>
                         <option value="DNG">Đà Nẵng</option>
                         <option value="QNM">Quảng Nam</option>
                         <option value="QNI">Quảng Ngãi</option>
                         <option value="BDH">Bình Định</option>
                         <option value="PYN">Phú Yên</option>
                         <option value="KHA">Khánh Hòa</option>
                         <option value="NTN">Ninh Thuận</option>
                         <option value="BTN">Bình Thuận</option>
                         <option value="KTM">Kon Tum</option>
                         <option value="GLI">Gia Lai</option>
                         <option value="DLK">Đắk Lắk</option>
                         <option value="DKG">Đắk Nông</option>
                         <option value="LDG">Lâm Đồng</option>
                         <option value="BPC">Bình Phước</option>
                         <option value="TNH">Tây Ninh</option>
                         <option value="BDG">Bình Dương</option>
                         <option value="DNI">Đồng Nai</option>
                         <option value="VTU">Bà Rịa - Vũng Tàu</option>
                         
                         <option value="LAN">Long An</option>
                         <option value="TGG">Tiền Giang</option>
                         <option value="BTE">Bến Tre</option>
                         <option value="TVH">Trà Vinh</option>
                         <option value="VLG">Vĩnh Long</option>
                         <option value="DTP">Đồng Tháp</option>
                         <option value="AGG">An Giang</option>
                         <option value="KGG">Kiên Giang</option>
                         <option value="CTO">Cần Thơ</option>
                         <option value="HUG">Hậu Giang</option>
                         <option value="STG">Sóc Trăng</option>
                         <option value="BLU">Bạc Liêu</option>
                         <option value="CMU">Cà Mau</option>
                         
                         
                      </select>
                   </div>
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Quận/Huyện</label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                      <select class="form-control" id="exampleFormControlSelect1">
                         <option>Quận 7</option>
                         <option>2</option>
                         <option>3</option>
                         <option>4</option>
                         <option>5</option>
                      </select>
                   </div>
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Lựa chọn gói dịch vụ</label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                      <select class="form-control" id="exampleFormControlSelect1">
                         <option>Internet FPT</option>
                         <option>Truyền Hình FPT</option>
                         <option>Combo Internet + Truyền Hình</option>
                         <option>FPT Play Box</option>
                         <option>FPT Camera</option>
                         <option>FPT iHome</option>
                         <option>Dịch vụ khác</option>

                      </select>
                   </div>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="row">
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Loại nhà</label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                      <select class="form-control" id="exampleFormControlSelect1">
                         <option>Nhà riêng</option>
                         <option>Chung cư</option>
                     
                      </select>
                   </div>
                   <div class="col-lg-4 formsignin__col">
                      <label for="exampleFormControlSelect1">Số nhà</label>
                   </div>
                   <div class="col-lg-8 formsignin__col">
                      <input type="text" class="form-control" placeholder="Địa chỉ" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   
                </div>
             </div>

          </div>
          <div class="map-text">
             <p>
                Qúy khách có thể kiểm tra và điều chỉnh tọa độ địa chỉ lắp đặt trên bản đồ dưới đây
             </p>
          </div>
       </div>
     
    </section>
    <section class="map">

       <div class="container">
          <div class="row">

             <div class="block-title block__orange">
                <h2>
                <span class="block__image">
                   <i class="fas fa-globe-americas"></i>
                </span>
               CHỌN VỊ TRÍ TRÊN BẢN ĐỒ
                </h2>
             </div>

             <div class="col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.809554290197!2d106.72645431483646!3d10.749156262635697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525815051a783%3A0x4d8efcfbb7de21d1!2zQsO5aSBWxINuIEJh!5e0!3m2!1svi!2s!4v1614709474004!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>
          </div>
       </div>
    </section> -->
 </main>
@endsection
