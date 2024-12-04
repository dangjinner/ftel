@extends('public.account.layout')
@section('sub_content')
    <div>
        <div class="text-center ">
            <h2>Thông tin sản phẩm affiliate</h2>
        </div>
        <div class="mt-3">
            @if(session()->has('message'))
                <div class="alert alert-success mb-3">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <div class="img-fluid">
                        <img alt="{{ $product->name }}" src="{{ $product->base_image->path }}" width="100%"/>
                    </div>
                    <div class="btn-group mt-3">
                        <button id="createAffiliateLinkButton" class="btn btn-success">+ Tạo link affiliate</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                        <b>Tên sản phẩm: </b>
                        <p class="mb-3">{{ $product->name }}</p>
                    </div>
                    <div>
                        <b>Hoa hồng: </b>
                        <p class="mb-3">{{ $product->fm_commission->format() }}</p>
                    </div>
                    <div>
                        <b>Link gốc: </b>
                        <p class="mb-3">
                            <a class="text-primary" href="{{ $product->original_link }}"
                               target="_blank">{{ $product->original_link }}</a>
                        </p>
                    </div>
                    <div>
                        <b>Mô tả: </b>
                        <div class="mb-3">{!!  $product->description ?? 'Chưa có' !!} </div>
                    </div>
                    <div>
                        <b>Thông tin chi tiết: </b>
                        <div class="mb-3">{!! $product->info ?? 'Chưa có' !!}</div>
                    </div>
                    <div>
                        <b>Thời gian lưu cookie: </b>
                        <div>{{ $product->is_set_cookie ? $product->cookie_duration . ' ngày' : 'Không' }}</div>
                        <small class="text-primary">(Đây là thời gian lưu mã affiliate trên trình duyệt của khách
                            hàng!)</small>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-light p-3 shadow-lg" id="createLinkForm" style="display: none">
                <h3 class="mb-3">Tạo affiliate link - {{ $product->name }}</h3>
                <form method="POST" action="{{ route('affiliate.products.create_link', ['id' => $product->id]) }}">
                    @csrf
                    <div class="form-check mb-2">
                        <input class="form-check-input" name="is_short_link" type="checkbox" value="1"
                               id="is_short_link">
                        <label class="form-check-label" for="is_short_link">
                            Tạo short link
                        </label>
                        <span class="text-primary">({{ route('affiliate.ctv.link', ['code' => 'Zn5BHab9Hd']) }})</span>
                    </div>

                      <div class="d-flex align-items-center">
                          <a id="btnAddOption" class=" mr-1" style="font-weight: bold; color: #0738b7" data-toggle="collapse" href="#utm-section" role="button"
                             aria-expanded="false" aria-controls="multiCollapseExample1">+ Thêm tùy chọn
                          </a>
                      </div>
                    <div id="utm-section" class="collapse multi-collapse">
                        <div class="form-row form-group">
                            <div class="col-md-6 col-sm-12">
                                <label for="utm_source">Utm Source</label>
                                <input type="text" id="utm_source" name="utm_source" value=""
                                       class="form-control @error('utm_source') is-invalid @enderror"
                                       placeholder="Enter utm source">
                                @error('utm_source')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="utm_medium">Utm Medium</label>
                                <input type="text" id="utm_medium" name="utm_medium" value=""
                                       class="form-control @error('utm_medium') is-invalid @enderror"
                                       placeholder="Enter utm medium">
                                @error('utm_medium')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-6 col-sm-12">
                                <label for="utm_campaign">Utm campaign</label>
                                <input type="text" id="utm_campaign" name="utm_campaign" value=""
                                       class="form-control @error('utm_campaign') is-invalid @enderror"
                                       placeholder="Enter campaign">
                                @error('utm_campaign')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="utm_content">Utm content</label>
                                <input type="text" id="utm_content" name="utm_content" value=""
                                       class="form-control @error('utm_content') is-invalid @enderror"
                                       placeholder="Enter content">
                                @error('utm_content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary w-30">Xác nhận tạo link</button>
                </form>
            </div>
            @if(count($product->ownLinks) > 0)
                <div class="mt-3">
                    <h3>Danh sách affiliate links</h3>
                    <div class="mt-3 table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">URL</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->ownLinks as $link)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a class="text-primary"
                                           href="{{ route('affiliate.single_link', ['code' => $link->code]) }}">
                                            {{ $link->ctv_link }}
                                        </a>
                                    </td>
                                    <td>{{ $link->created }}</td>
                                    <td>{{ $link->status == 1 ? 'Đang hoạt động' : 'Đã bị hủy' }}</td>
                                    <td>
                                        <button data-link="{{ $link->ctv_link }}"
                                                class="btn btn-sm btn-primary btnCopyLink">Copy Link
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('sub_scripts')
    <script>
        $(document).ready(function () {
            const btnCreateLink = $('#createAffiliateLinkButton');
            const createLinkForm = $('#createLinkForm');
            const btnCopyLink = $('.btnCopyLink');
            const btnAddOption = $('#btnAddOption');

            btnCreateLink.click(function (e) {
                e.preventDefault();
                createLinkForm.show();
                $('html, body').animate({
                    scrollTop: $("#createLinkForm").offset().top - 200
                }, 1000);


                createLinkForm.css('box-shadow', "rgba(0, 0, 0, 0.24) 0px 3px 8px");
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

            btnAddOption.click(function(e) {
                if($(this).attr('aria-expanded') == 'false') {
                    $(this).text('- Ẩn tùy chọn');
                } else {
                    $(this).text('+ Thêm tùy chọn');
                }
            })
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
