@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('affiliate::accounts.account')]))

    <li><a href="{{ route('admin.affiliate_accounts.index') }}">{{ trans('affiliate::accounts.accounts') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('affiliate::accounts.account')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_accounts.store') }}" class="form-horizontal" id="affiliate-account-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('affiliateAccount')) !!}
    </form>
@endsection


