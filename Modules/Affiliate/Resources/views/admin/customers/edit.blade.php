@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('affiliate::customers.customer')]))

    <li><a href="{{ route('admin.affiliate_customers.index') }}">{{ trans('affiliate::customers.customers') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('affiliate::customers.customer')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_customers.update', ['id' => $affiliateCustomer->id]) }}" class="form-horizontal" id="affiliate-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('affiliateCustomer')) !!}
    </form>
@endsection

