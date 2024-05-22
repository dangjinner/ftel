@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('affiliate::accounts.accounts'))

    <li class="active">{{ trans('affiliate::accounts.accounts') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'affiliate_accounts')
    @slot('name', trans('affiliate::accounts.account'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('affiliate::accounts.table.full_name') }}</th>
            <th>{{ trans('affiliate::accounts.table.email') }}</th>
            <th>{{ trans('affiliate::accounts.table.phone_number') }}</th>
            <th>{{ trans('admin::admin.table.status') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>

    @endslot
@endcomponent

@push('scripts')
    <script>
        DataTable.setRoutes('#affiliate_accounts-table .table', {
            index: 'admin.affiliate_accounts.index',
            edit: 'admin.affiliate_accounts.edit',
            destroy: 'admin.affiliate_accounts.destroy',
        });

        new DataTable('#affiliate_accounts-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'full_name', name: 'full_name', orderable: false, defaultContent: '' },
                { data: 'email', name: 'email', orderable: false, defaultContent: '' },
                { data: 'phone_number', name: 'phone_number', orderable: false, defaultContent: '' },
                { data: 'status', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
