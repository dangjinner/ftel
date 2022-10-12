@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('service::services.service')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.services.index') }}">{{ trans('service::services.services') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('service::services.service')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.services.update', $service) }}" class="form-horizontal" id="service-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('service')) !!}

    </form>
@endsection

@include('service::admin.services.partials.shortcuts')
