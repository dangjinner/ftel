@component('admin::components.table')
    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('user::users.table.first_name') }}</th>
            <th>{{ trans('user::users.table.last_name') }}</th>
            <th>{{ trans('user::users.table.email') }}</th>
            <th>{{ trans('user::users.table.last_login') }}</th>
            <th data-sort>{{ trans('admin::admin.table.created') }}</th>
        </tr>
    @endslot
@endcomponent

@push('scripts')
    <script>
        DataTable.setSelectedIds('#users .table', {!! old_json('users', [$affiliateAccount->user_id]) !!});

        DataTable.setRoutes('#users .table', {
            index: 'admin.users.index',
            edit: 'admin.users.edit',
        });

        new DataTable('#users .table', {
            pageLength: 10,
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'last_login', name: 'last_login', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });

        window.admin.removeSubmitButtonOffsetOn([
            'users'
        ]);

        function handleGetSelectedIds() {
            DataTable.removeLengthFields();
            const selectedIds = DataTable.getSelectedIds('#users .table').filter((id) => id !== null);

            window.form.appendHiddenInputs('#affiliate-account-create-form, #affiliate-account-edit-form', 'users', selectedIds);
        }

        $('#affiliate-account-create-form').submit(function(e) {
            e.preventDefault();

            handleGetSelectedIds();

            e.currentTarget.submit();
        });

        $('#affiliate-account-edit-form').submit(function(e) {
            e.preventDefault();

            handleGetSelectedIds();

            e.currentTarget.submit();
        });


    </script>
@endpush
