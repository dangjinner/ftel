@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('affiliate::products.product')]))

    <li><a href="{{ route('admin.affiliate_products.index') }}">{{ trans('affiliate::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('affiliate::products.product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_products.update', ['id' => $affiliateProduct->id]) }}" class="form-horizontal" id="affiliate-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('affiliateProduct')) !!}
    </form>
@endsection

