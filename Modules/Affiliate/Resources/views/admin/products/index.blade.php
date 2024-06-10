@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('affiliate::products.products'))

    <li class="active">{{ trans('affiliate::products.products') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'affiliate_products')
    @slot('name', trans('affiliate::products.product'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('affiliate::products.table.thumbnail') }}</th>
            <th>{{ trans('affiliate::products.table.name') }}</th>
            <th>{{ trans('admin::admin.table.status') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>

    @endslot
@endcomponent

@push('scripts')
    <script>
        DataTable.setRoutes('#affiliate_products-table .table', {
            index: 'admin.affiliate_products.index',
            edit: 'admin.affiliate_products.edit',
            destroy: 'admin.affiliate_products.destroy',
        });

        new DataTable('#affiliate_products-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
                { data: 'status', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
