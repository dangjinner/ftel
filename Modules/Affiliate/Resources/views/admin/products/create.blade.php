@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('affiliate::products.product')]))

    <li><a href="{{ route('admin.affiliate_products.index') }}">{{ trans('affiliate::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('affiliate::products.product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_products.store') }}" class="form-horizontal" id="affiliate-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('affiliateProduct')) !!}
    </form>
@endsection

