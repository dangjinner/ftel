@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="mt-3">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="img-thumbnail">
                                    <img width="100%" src="{{ $product->base_image->path }}" alt="product-thumbnail"/>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-dark">{{ $product->name }}</h3>
                                    <div class="mt-1">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-grayscale-400 font-weight-normal">Hoa hồng:</span>
                                            <strong class="text-danger">{{ $product->fm_commission->format() }}</strong>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('affiliate.single_product', ['id' => $product->id]) }}"
                                           class="btn btn-primary w-100">Đăng ký ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
