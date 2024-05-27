@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('affiliate::customers.customers'))

    <li class="active">{{ trans('affiliate::customers.customers') }}</li>
@endcomponent

@component('admin::components.page.index_table')
{{--    @slot('buttons', ['create'])--}}
    @slot('resource', 'affiliate_customers')
    @slot('name', trans('affiliate::customers.customer'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('affiliate::customers.table.name') }}</th>
            <th>{{ trans('affiliate::customers.table.phone_number') }}</th>
            <th>{{ trans('affiliate::customers.table.service_option') }}</th>
            <th>{{ trans('affiliate::customers.table.status') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>

    @endslot
@endcomponent

@push('scripts')
    <script>
        DataTable.setRoutes('#affiliate_customers-table .table', {
            index: 'admin.affiliate_customers.index',
            edit: 'admin.affiliate_customers.edit',
            destroy: 'admin.affiliate_customers.destroy',
        });

        new DataTable('#affiliate_customers-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
                { data: 'phone_number', name: 'phone_number', orderable: false, defaultContent: '' },
                { data: 'service_option', name: 'service_option', orderable: false, defaultContent: '' },
                { data: 'status', name: 'status', orderable: true },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
