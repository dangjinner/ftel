@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2>Thông tin affiliate link</h2>
            <a class="text-primary" href="{{ $link->ctv_link }}" target="_blank">
                {{ $link->ctv_link }}
            </a>
        </div>
        <div class="mt-3">
            <div>
                <h3>Danh sách khách hàng đăng ký</h3>
                <div class="mt-3 table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian tạo</th>
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
