@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2>Danh sách khách hàng đã đăng ký</h2>
        </div>
        <div class="mt-3">
            <div>
                <div class="mt-3 table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Dịch vụ</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $customer->name }}
                                </td>
                                <td>
                                    {{ $customer->phone_number }}
                                </td>
                                <td>
                                    {{ $customer->service_option }}
                                </td>
                                <td>
                                    {{ trans('affiliate::customers.form.status')[$customer->status] }}
                                </td>
                                <td>{{ $customer->created }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Chưa có khách hàng đăng ký</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('sub_scripts')
    <script>
        $(document).ready(function () {
            const btnCreateLink = $('#createAffiliateLinkButton');
            const createLinkForm = $('#createLinkForm');
            const btnCopyLink = $('.btnCopyLink');

            btnCreateLink.click(function (e) {
                e.preventDefault();
                createLinkForm.show();
            });

            btnCopyLink.click(function (e) {
                e.preventDefault();
                const link = $(this).data('link');

                copyContent(link)
                    .then(res => {
                        $(this).text('Đã copy');
                        const timerId = setTimeout(() => {
                            $(this).text('Copy Link');
                        }, 3000);
                    });
            });

        })

        async function copyContent(text) {
            try {
                await navigator.clipboard.writeText(text);
                /* Resolved - text copied to clipboard successfully */
            } catch (err) {
                /* Rejected - text failed to copy to the clipboard */
            }
        }
    </script>
@endpush
