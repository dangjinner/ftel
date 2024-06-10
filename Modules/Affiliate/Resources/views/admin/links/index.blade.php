@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('affiliate::links.links'))

    <li class="active">{{ trans('affiliate::links.links') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'affiliate_links')
    @slot('name', trans('affiliate::links.link'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('affiliate::links.table.code') }}</th>
            <th>{{ trans('affiliate::links.table.product') }}</th>
            <th>{{ trans('affiliate::links.table.account') }}</th>
            <th>{{ trans('admin::admin.table.status') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>

    @endslot
@endcomponent

@push('scripts')
    <script>
        DataTable.setRoutes('#affiliate_links-table .table', {
            index: 'admin.affiliate_links.index',
            edit: 'admin.affiliate_links.edit',
            destroy: 'admin.affiliate_links.destroy',
        });

        new DataTable('#affiliate_links-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'affLink', orderable: false, defaultContent: '' },
                { data: 'product', searchable: false },
                { data: 'account', orderable: false, defaultContent: '' },
                { data: 'status', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
