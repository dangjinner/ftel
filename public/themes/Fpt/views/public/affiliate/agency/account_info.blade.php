@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2 >Thông tin đại lý</h2>
        </div>
        <div class="mt-3">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('affiliate.agency.account_info.update') }}" novalidate>
                @csrf
                <div class="form-row form-group">
                    <div class="col">
                        <label for="last_name">Họ, tên đệm<span class="text-danger">*</span></label>
                        <input type="text" id="last_name" name="last_name" value="{{ $affiliateAccount->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter last name">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="first_name">Tên<span class="text-danger">*</span></label>
                        <input type="text" id="first_name" name="first_name" value="{{ $affiliateAccount->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter first name">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone_number">Số điện thoại<span class="text-danger">*</span></label>
                    <input type="tel" id="phone_number" name="phone_number" value="{{ $affiliateAccount->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter phone number">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email<span class="text-danger">*</span></label>
                    <input type="email" disabled id="email" name="email" value="{{ $affiliateAccount->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ<span class="text-danger">*</span></label>
                    <input type="text" disabled id="address" name="address" value="{{ $affiliateAccount->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
