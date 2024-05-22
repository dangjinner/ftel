@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('affiliate::accounts.account')]))

    <li><a href="{{ route('admin.affiliate_accounts.index') }}">{{ trans('affiliate::accounts.accounts') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('affiliate::accounts.account')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_accounts.update', ['id' => $affiliateAccount->id]) }}" class="form-horizontal" id="affiliate-account-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('affiliateAccount')) !!}
    </form>
@endsection

