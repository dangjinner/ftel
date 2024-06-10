@component('admin::components.table')
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
        DataTable.setSelectedIds('#products .table', {!! old_json('products', [$affiliateLink->aff_product_id]) !!});

        DataTable.setRoutes('#products .table', {
            index: 'admin.affiliate_products.index',
            edit: 'admin.affiliate_products.edit',
        });

        new DataTable('#products .table', {
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
