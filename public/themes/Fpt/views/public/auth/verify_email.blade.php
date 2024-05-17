@extends('public.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Xác thực email</h2>
                @error('error')
                <div class="alert alert-danger mt-2 mb-2">
                    {{ $message }}
                </div>
                @enderror
                @if(Session::has('message'))
                <div class="alert alert-danger mt-2 mb-2">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="card mt-3 p-3">
                    <form method="POST" action="{{ route('auth.verify.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Nhập lại địa chỉ email:</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Nhập địa chỉ email">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Xác thực</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
