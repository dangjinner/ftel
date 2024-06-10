@component('admin::components.table')
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
        DataTable.setSelectedIds('#accounts .table', {!! old_json('accounts', [$affiliateLink->aff_account_id]) !!});

        DataTable.setRoutes('#accounts .table', {
            index: 'admin.affiliate_accounts.index',
            edit: 'admin.affiliate_accounts.edit',
        });

        new DataTable('#accounts .table', {
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
