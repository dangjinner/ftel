@extends('public.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @if(isset($message))
                    <h2 class="text-center text-dark mt-5">Hoàn tất xác minh</h2>
                    <div class="alert alert-success mt-2 mb-2">
                        {{ $message }}
                    </div>
                @endif
                @if(isset($error))
                        <h2 class="text-center text-dark mt-5">Thất bại!</h2>
                    <div class="alert alert-danger mt-2 mb-2">
                        {{ $error }}
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
