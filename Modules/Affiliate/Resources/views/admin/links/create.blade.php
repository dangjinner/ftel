@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('affiliate::links.link')]))

    <li><a href="{{ route('admin.affiliate_links.index') }}">{{ trans('affiliate::links.links') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('affiliate::links.link')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.affiliate_links.store') }}" class="form-horizontal"
          id="affiliate-link-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('affiliateLink')) !!}
    </form>
@endsection

@push('scripts')
    <script>
        window.admin.removeSubmitButtonOffsetOn([
            'accounts'
        ]);

        function handleGetSelectedIds() {
            DataTable.removeLengthFields();
            const accountIds = DataTable.getSelectedIds('#accounts .table').filter((id) => id !== null);
            const productIds = DataTable.getSelectedIds('#products .table').filter((id) => id !== null);

            window.form.appendHiddenInput('#affiliate-link-create-form, #affiliate-link-edit-form', 'aff_account_id', accountIds[0]);
            window.form.appendHiddenInput('#affiliate-link-create-form, #affiliate-link-edit-form', 'aff_product_id', productIds[0]);
        }

        $('#affiliate-link-create-form').submit(function(e) {
            e.preventDefault();

            handleGetSelectedIds();

            e.currentTarget.submit();
        });

    </script>
@endpush

