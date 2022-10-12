@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('storebranch::store_branches.store_branch')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.store_branches.index') }}">{{ trans('storebranch::store_branches.store_branches') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('storebranch::store_branches.store_branch')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.store_branches.update', $storeBranch) }}" class="form-horizontal" id="store-branch-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        {{ Form::text('name', trans('storebranch::attributes.name'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('address', trans('storebranch::attributes.address'), $errors, $storeBranch, ['labelCol' => 2]) }}
        {{ Form::number('latitude', trans('storebranch::attributes.latitude'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::number('longitude', trans('storebranch::attributes.longitude'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('hotline_sales', trans('storebranch::attributes.hotline_sales'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('switchboard_cskh', trans('storebranch::attributes.switchboard_cskh'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('time_work', trans('storebranch::attributes.time_work'), $errors, $storeBranch, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('province_id', trans('storebranch::attributes.province'), $errors, $provinces, $storeBranch, ['labelCol' => 2, 'class' => 'selectize prevent-creation']) }}
        <div>
            <button type="submit" class="btn btn-primary" data-loading id="savePublish">
                {{ trans('admin::admin.buttons.save') }}
            </button>
        </div>
    </form>
@endsection

@include('storebranch::admin.store_branches.partials.shortcuts')
