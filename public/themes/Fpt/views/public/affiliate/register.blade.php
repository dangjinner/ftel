@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2 >Đăng ký tài khoản Affiliate</h2>
        </div>
        <div class="mt-3">
            @if(session()->exists('message'))
                <div class="alert alert-success mb-3">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('affiliate.register.post') }}">
                @csrf
                <h3 class="font-weight-bold mb-2">Thông tin cá nhân:</h3>
                <div class="form-row form-group">
                    <div class="col-md-6 col-sm-12 ">
                        <label for="last_name">Họ, tên đệm<span class="text-danger">*</span></label>
                        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter last name">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="first_name">Tên<span class="text-danger">*</span></label>
                        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter first name">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone_number">Số điện thoại<span class="text-danger">*</span></label>
                    <input type="tel" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter phone number">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email<span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ<span class="text-danger">*</span></label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter your address">
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <h3 class="font-weight-bold mb-2">Thông tin thanh toán:</h3>

                <div class="form-group form-row">
                    <div class="col-md-6 col-sm-12">
                        <label for="bank_account_name">Tên người thụ hưởng<span class="text-danger">*</span></label>
                        <input type="text" id="bank_account_name" name="bank_account_name" value="{{ old('bank_account_name') }}" class="form-control @error('bank_account_name') is-invalid @enderror">
                        @error('bank_account_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="bank_account_number">Số tài khoản<span class="text-danger">*</span></label>
                        <input type="text" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number') }}" class="form-control @error('bank_account_number') is-invalid @enderror">
                        @error('bank_account_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group form-row">
                    <div class="col-md-6 col-sm-12">
                        <label for="bank_name">Tên ngân hàng<span class="text-danger">*</span></label>
                        <input type="text" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" class="form-control @error('bank_name') is-invalid @enderror">
                        @error('bank_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="bank_branch">Chi nhánh<span class="text-danger">*</span></label>
                        <input type="text" id="bank_branch" name="bank_branch" value="{{ old('bank_branch') }}" class="form-control @error('bank_branch') is-invalid @enderror">
                        @error('bank_branch')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary w-100">Gửi đăng ký</button>
            </form>
        </div>
    </div>
@endsection
