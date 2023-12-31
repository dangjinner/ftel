<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 10rem">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="commentModalTitle">Đăng nhập để tiếp tục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center flex-column" style="gap: 10px">
{{--                    <a class="ml-1 btn btn-primary" href="{{ url('auth/facebook') }}"--}}
{{--                       style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;"--}}
{{--                       id="btnLoginFacebook">--}}
{{--                        <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook--}}
{{--                    </a>--}}
                    <a href="{{ url('auth/google') . '?callbackUrl=' . request()->getRequestUri() }}">
                        <div class="google-btn d-flex align-items-center">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="{{ v(Theme::url('assets/images/icon/google.png')) }}"/>
                            </div>
                            <p class="google-btn-text"><b>Đăng nhập bằng tài khoản Google</b></p>
                        </div>
                    </a>

{{--                    <a class="ml-1 btn btn-primary"--}}
{{--                       href="{{ url('auth/google') . '?callbackUrl=' . request()->getRequestUri() }}"--}}
{{--                       style="margin-top: 0px !important;background: #ec0721;color: #ffffff;padding: 5px;border-radius:7px;"--}}
{{--                       id="btnLoginGoogle">--}}
{{--                        <i class="fa fa-google" aria-hidden="true"></i> Login with Google--}}
{{--                    </a>--}}

                </div>
            </div>
            <div class="modal-footer">
                {{--                <button id="btnSubmitCommentForm" type="button" class="btn btn-primary">Hoàn tất</button>--}}
            </div>
        </div>
    </div>
</div>
