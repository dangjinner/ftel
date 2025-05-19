@extends('public.layout')

@section('content')
<main class="col-md-8 col-md-offset-2 center">
    <section class="steps">
       <ul class="progress">
         <li class="active"><i class="fas fa-building"></i><a href="#">Kiểm tra hạ tầng</a></li>
         <li class="no-active"><i class="fas fa-file-signature"></i><a href="#">Hoàn tất đăng ký</a></li>
      </ul>
    </section>

    <section class="container">
       <form id="form-check" class="form-horizontal" method="post">

          {{ csrf_field() }}


          <!-- Thông tin khách hàng -->
          <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="inside-content mgt40">
                   <!-- Headline Title -->
                   <h3 class="headline hl-25 hl-ico hl-ico-info">

                      <i class="fas fa-user-edit icon"></i> THÔNG TIN KHÁCH HÀNG
                            </h3>
                   <!-- Form -->
                   <div class="inside-content inner30 pt10 bg-rv ">
                      <div class="row">
                         <!-- Form description -->
                         <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="form-desc">Thông tin chủ hợp đồng:</p>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- Ho ten -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Họ và tên <i class="notice">*</i></label>
                               <div class="col-sm-8">
                                  <input name="fullname" value="" type="text" class="form-control" placeholder="Họ và tên"> </div>
                            </div>
                            <!-- Sdt -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Số điện thoại <i class="notice">*</i></label>
                               <div class="col-sm-8">
                                  <input name="phonenumber" value="" type="text" class="form-control" placeholder="Số điện thoại"> </div>
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- Email -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Email</label>
                               <div class="col-sm-8">
                                  <input name="email" value="" type="email" class="form-control" placeholder="Nếu có"> </div>
                            </div>
                         </div>
                         <!-- Form note -->
                         <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="form-note">(*) Vui lòng điền đầy đủ các thông tin này </p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- Thông tin địa chỉ lắp đặt -->
          <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="inside-content mgt40">
                   <!-- Headline Title -->
                   <h3 class="headline hl-25 hl-ico hl-ico-add">

                      <i class="fas fa-map-marked-alt icon"></i>THÔNG TIN ĐỊA CHỈ LẮP ĐẶT
                            </h3>
                   <!-- Form -->
                   <div class="inside-content inner30 pt10 bg-rv ">
                      <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- Tinh/ Tp -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Tỉnh/Thành phố</label>
                               <div class="col-sm-8">
                                  <select name="location" onchange="Check.changeLocation(this)" class="form-control" id="location">
                                     <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                     @foreach($provinces as $province)
                                     <option value="8" data-name="Hồ Chí Minh">{{ $province->name }}</option>
                                     @endforeach
                                  </select>
                               </div>
                            </div>
                            <!-- Quan huyen -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Quận/Huyện</label>
                               <div class="col-sm-8">
                                  <select name="district" onchange="Check.changeDistrict(this)" class="form-control" id="district">
                                     <option value="">-- Chọn Quận/Huyện --</option>
                                  </select>
                               </div>
                            </div>
                            <!-- Phuong xa -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Lựa chọn dịch vụ</label>
                               <div class="col-sm-8">
                                  <select name="ward" onchange="Check.changeWard(this)" class="form-control" id="ward">
                                     <option value="">-- Chọn sản phẩm dịch vụ --</option>
                                     <option value="">Internet FPT</option>
                                     <option value="">Truyền hình FPT </option>
                                     <option value="">Combo Internet + Truyền hình FPT</option>
                                     <option value="">FPT Camera</option>
                                     <option value="">Combo Internet + Camera</option>
                                     <option value="">FPT Play Box</option>
                                     <option value="">FPT iHome</option>
                                     <option value="">Dịch vụ khác</option>

                                  </select>
                               </div>
                            </div>
                            <!-- Duong -->

                            <!-- <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Địa chỉ hợp đồng:</label>
                               <div class="col-sm-8"> <span for="" id="txt_address" class="info-address"></span>
                                  <input value="" type="hidden" id="address" name="address"> </div>
                            </div> -->
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- Loại nhà -->
                            <div class="form-group row">
                               <label for="" class="col-sm-4 col-form-label">Loại nhà</label>
                               <div class="col-sm-8">
                                  <select name="housetype" id="housetype" class="form-control">
                                     <option value="1">Nhà riêng</option>
                                     <option value="2">Chung cư</option>
                                  </select>
                               </div>
                            </div>
                            <div class="housetype1">
                               <!-- Quan huyen -->
                               <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Địa chỉ</label>
                                  <div class="col-sm-8">
                                     <input value="" name="housenumber" onblur="Check.getAddress()" id="housenumber" type="text" class="form-control" placeholder="Số nhà"> </div>
                               </div>
                            </div>
                            <div class="housetype1">
                               <!-- Quan huyen -->
                               <div class="form-group row">
                                  <label for="" class="col-sm-4 col-form-label">Ghi chú</label>
                                  <div class="col-sm-8">
                                     <input value="" name="housenumber" id="housenumber" type="text" class="form-control" placeholder="Nếu có"> </div>
                               </div>
                            </div>

                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </form>
       <!-- Submit Next Step -->
       <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 text-center mgt30">
             <!-- Button trigger modal Message -->
             <!-- <button class="btn" type="button" data-toggle="modal" data-target="#mdMessage">Yêu cầu gọi lại</button> -->
             <!-- Button trigger modal OTP -->
             <button class="g-recaptcha btn btn-action btn-ico  mt-5 backgorud-red white" data-sitekey="6Ldnq30aAAAAAKXe8buZym6C4RawKU8t4U5c2b05" data-callback='onSubmit'>Đăng ký ngay</button>
          </div>
       </div>
    </section>

 </main>
@endsection

@section('script')
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <script>
    $(document).ready(function(){
        $('#provinces').select2({
            placeholder: "-- Chọn Tỉnh/Thành phố --"
        });
    });
    function onSubmit(token) {
      document.getElementById("form-check").submit();
    }
  </script>

@endsection
