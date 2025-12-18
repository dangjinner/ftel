<div class="modal fade contact-modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content contact-modal-content">

            <!-- Nút đóng -->
            <button type="button" class="btn-close contact-modal-close" data-bs-dismiss="modal" aria-label="Close">
            </button>

            <!-- Thân modal -->
            <div class="modal-body contact-modal-body position-relative">

                <!-- Tiêu đề giữa modal -->
                <h3 class="contact-modal-title text-uppercase fw-bold text-center mb-4">
                    {{ setting('contact_modal_title') ?? 'Đăng ký nhận tư vấn miễn phí' }}
                </h3>

                <div class="contact-modal-offer-text contact-modal-mb-offer-text d-none">
                    <p class="text-center">{!! setting('contact_modal_content') !!}</p>
                </div>

                <div class="row align-items-center">
                    <!-- Hình bên trái -->
                    <div class="col-md-6 contact-modal-left position-relative text-center">
                        <div class="contact-modal-offer-text">
                            <p class="text-center">{!! setting('contact_modal_content') !!}</p>
                        </div>
                        <img src="{{ v(Theme::url('assets/images/contact-modal-img.webp')) }}" alt="FPT Team"
                             class="img-fluid contact-modal-img">
                    </div>

                    <!-- Form bên phải -->
                    <div class="col-md-6 contact-modal-right">
                        <form method="POST" action="{{ route('fpt.contactForm.post') }}" class="contact-modal-form">
                            @csrf
                            <input type="hidden" name="from_page" value="{{ url()->current() }}"/>
                            <div class="mb-2">
                                <input type="text" name="cf_name" class="form-control contact-modal-input"
                                       placeholder="Họ và Tên" required>
                            </div>
                            <div class="mb-2">
                                <input type="tel" name="cf_phone" class="form-control contact-modal-input"
                                       placeholder="Số điện thoại" required>
                            </div>
                            <div class="mb-2">
                                <input type="text" name="cf_address" class="form-control contact-modal-input"
                                       placeholder="Địa chỉ lắp đặt" required>
                            </div>
                            <div class="mb-3">
                                <select name="cf_service" class="form-control contact-modal-select" required>
                                    <option selected disabled>Gói dịch vụ quan tâm</option>
                                    @foreach($registerServiceOptions as $option)
                                        <option value="{{ $option }}"
                                            {{ old('options_service') == $option ? 'selected' : '' }}>
                                            {{$option}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn contact-modal-btn-submit fw-bold">
                                    Đăng ký ngay
                                </button>
                                <p class="contact-modal-note mt-3 mb-0">
                                    {{ setting('contact_modal_note') }}
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    // Các route không hiển thị modal
    $excludedRoutes = [
        'shop.index',
        'shop.detail',
        'cart.index',
        'account.profile',
        'account.orders',
        'affiliate.dashboard',
        'auth.login',
        'auth.register',
        'pages.register',
        'pages.thankyou',
    ];

    // Lấy danh sách URL (path) không hiển thị modal từ setting, cách nhau bằng dấu phẩy
    $excludedPaths = array_filter(array_map('trim', explode(',', setting('contact_modal_disabled_pages'))));

    // Kiểm tra có nên hiển thị modal hay không
    $shouldShowModal = true;

    foreach ($excludedRoutes as $route) {
        if (request()->routeIs($route)) {
            $shouldShowModal = false;
            break;
        }
    }

    // Nếu vẫn cho hiển thị, kiểm tra theo path URL
    if ($shouldShowModal && !empty($excludedPaths)) {
        $currentPath = trim(request()->path(), '/'); // loại bỏ dấu "/"

        foreach ($excludedPaths as $path) {
            $path = trim($path, '/');
            if (\Illuminate\Support\Str::is($path, $currentPath)) {
                $shouldShowModal = false;
                break;
            }
        }
    }

    // Thời gian delay (ms)
    $modalDelay = 15000; // 15 giây

    $showTime = setting('contact_modal_show_time');

    // Ép kiểu về số và kiểm tra hợp lệ
    $showTime = intval($showTime);

    if ($showTime > 0) {
        $modalDelay = $showTime * 1000;
    }
@endphp

@if ($shouldShowModal)
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                const modalElement = $('#contactModal');
                if (!modalElement) return;

                modalElement.modal('show');
            }, {{ $modalDelay }});

            $('.contact-modal-close').click(function (e) {
                e.preventDefault();

                $('#contactModal').modal('hide');
            })
        });
    </script>
@endif

