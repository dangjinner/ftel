@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('storebranch::store_branches.store_branches'))

    <li class="active">{{ trans('storebranch::store_branches.store_branches') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'store_branches')
    @slot('name', trans('storebranch::store_branches.store_branch'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('storebranch::store_branches.table.name') }}</th>
                <th>{{ trans('storebranch::store_branches.table.address') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#store_branches-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
                { data: 'address', address: 'name', searchable: false, defaultContent: '' },
                { data: 'created', name: 'created_at' },
                //
            ],
        });
    </script>
@endpush
