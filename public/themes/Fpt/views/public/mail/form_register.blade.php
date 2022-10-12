@extends('public.layout')
@section('css')
<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b,
    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border: solid #777;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 2.3px;
        transform: rotate(45deg);
    }
    
  
</style>
@endsection
@section('content')
<div class="single-banner" style="margin-bottom: 30px;">
    <img src="https://ftel.vn/storage/media/OKZay0uJNsx2ICACVfxObxnu2Fl9n9yvLy2NpA4j.png" alt="" class="img-fluid">
</div>
<main class="col-md-8 col-md-offset-2 center">

    <section class="steps">
        <ul class="progress">
            <li class="active"><i class="fas fa-building"></i><a href="#">Kiểm tra hạ tầng</a></li>
            <li class="no-active"><i class="fas fa-file-signature"></i><a href="#">Hoàn tất đăng ký</a></li>
        </ul>
    </section>

    <section class="container">
        <form action="{{ route('pages.sendMail') }}" id="form-check" class="form-horizontal" method="post">
            @csrf
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
                                        <label for="" class="col-sm-4 col-form-label">Họ và tên <i
                                                class="notice">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="fullname" value="{{ old('fullname') }}" type="text"
                                                class="form-control" placeholder="Họ và tên"> </div>
                                        @if($errors->has('fullname'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('fullname') }}</div>
                                        @endif
                                    </div>
                                    <!-- Sdt -->
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Số điện thoại <i
                                                class="notice">*</i></label>
                                        <div class="col-sm-8">
                                            <input name="phonenumber" value="{{ old('phonenumber') }}" type="text"
                                                class="form-control" placeholder="Số điện thoại"> </div>
                                        @if($errors->has('phonenumber'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('phonenumber') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <!-- Email -->
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Email*</label>
                                        <div class="col-sm-8">
                                            <input name="email" value="{{ old('email') }}" type="email"
                                                class="form-control" placeholder="Nếu có"> </div>
                                        @if($errors->has('email'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
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
                                            <select name="provinces" class="form-control" id="provinces">
                                                <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->has('provinces'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('provinces') }}</div>
                                        @endif
                                    </div>
                                    <!-- Quan huyen -->
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Quận/Huyện</label>
                                        <div class="col-sm-8">
                                            <select name="district" class="form-control" id="district">
                                                <option value="">-- Chọn Quận/Huyện --</option>
                                            </select>
                                        </div>
                                        @if($errors->has('district'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('district') }}</div>
                                        @endif
                                    </div>
                                    <!-- Phuong xa -->
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Lựa chọn dịch vụ</label>
                                        <div class="col-sm-8">
                                            <select name="ward" onchange="Check.changeWard(this)" class="form-control"
                                                id="ward">
                                                <option value="">-- Chọn sản phẩm dịch vụ --</option>
                                                 <option value="Gói cáp quang Cá nhân">
                                                     Gói cáp quang Cá nhân</option>
                                                 <option value="Gói cáp quang Doanh nghiệp">
                                                     Gói cáp quang Doanh nghiệp</option>
                                                <option value="Truyền hình FPT ">Truyền hình FPT </option>
                                                <option value="Combo Internet + Truyền hình FPT">Combo Internet + Truyền
                                                    hình FPT</option>
                                                <option value="FPT Camera">FPT Camera</option>
                                                <option value="Combo Internet + Camera">Combo Internet + Camera</option>
                                                <option value="FPT Play Box">FPT Play Box</option>
                                                <option value="FPT iHome">FPT iHome</option>
                                                <option value="Dịch vụ khác">Dịch vụ khác</option>
                                            </select>
                                        </div>
                                        @if($errors->has('ward'))
                                        <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                            {{ $errors->first('ward') }}</div>
                                        @endif
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
                                                <option value="Nhà riêng">Nhà riêng</option>
                                                <option value="Chung cư">Chung cư</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="housetype1">
                                        <!-- Quan huyen -->
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Địa chỉ*</label>
                                            <div class="col-sm-8">
                                                <input value="{{ old('housenumber') }}" name="housenumber"
                                                    onblur="Check.getAddress()" id="housenumber" type="text"
                                                    class="form-control" placeholder="Số nhà"> </div>
                                            @if($errors->has('housenumber'))
                                            <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                                {{ $errors->first('housenumber') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="housetype1">
                                        <!-- Quan huyen -->
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">Ghi chú</label>
                                            <div class="col-sm-8">
                                                <input value="{{ old('note') }}" name="note" id="housenumber"
                                                    type="text" class="form-control" placeholder="Nếu có"> </div>
                                            @if($errors->has('note'))
                                            <div style="margin-left:160px;font-size:9pt" class="text-danger">
                                                {{ $errors->first('note') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit Next Step -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center mgt30">
                    <button class="btn btn-action btn-ico  mt-5 backgorud-red white " type="submit">Đăng ký
                        ngay</button>
                </div>
            </div>
            <!-- Submit Next Step -->
        </form>
        <div class="row" style="margin-top: 5rem; background-color: #e9ecef; padding: 1rem">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center mgt30">
                <span class="text-default" style="font-size: 18px">Bạn gặp khó khăn khi đặt hàng ? Gọi ngay 
                <span style="color: red">0978888659</span> để được hỗ trợ.</span>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
<script>
    $('#provinces').change(function(){
        var countryID = $(this).val();
            if(countryID){
            $.ajax({
                    type:"GET",
                    url:"/dang-ky-thong-tin/" + countryID,
                    success:function (data) {
                        if (data) {
                            $("#district").empty();
                            $.each(data ,function (key,value) {
                                $("#district").append(`<option value="${key}">${value}</option>`);
                            });
                          

                        } else {
                            $("#district").empty();
                        }
                    }
            });
            }else{
            $("#district").empty();
            $("#provinces").empty();
            }
    });
    $(document).ready(function(){
        $('#provinces').select2({
            placeholder: "-- Chọn Tỉnh/Thành phố --"
        });
        $('#district').select2({
            placeholder: "-- Chọn Quận/Huyện --"
        });
    });
</script>
@endsection
