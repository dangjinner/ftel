
<section class="quality pricing" id="fpt-camera">
    <div class="container">
        <div class="row">
            <div class="pricing__title">
                <img alt="GÓI CƯỚC CAMERA FPT" src="{{ v(theme::url('assets/images/icon/fpt camera.png')) }}">
                GÓI CƯỚC CAMERA FPT
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item col-lg-6 col-6">
                <a class="nav-link font-weight-bold active show" data-toggle="tab" href="#home1">
                    <img src="{{ v(theme::url('assets/images/icon/camera trong nha fpt.png')) }}"> Camera FPT
                </a>
            </li>
            <li class="nav-item col-lg-6 col-6">
                <a class="nav-link font-weight-bold" data-toggle="tab" href="#menu1">
                    <img src="{{ v(theme::url('assets/images/icon/camera ngoai troi fpt.png')) }}">Gói Cloud
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home1">
                <div class="row">
                    @foreach ($category_services_camfpt->services as $item)
                        <div class="col-xs-6 col-lg-6 col-md-6 quality__left">
                            <div class="quality__inner">
                                <div class="quality__content row">
                                    <div class="quality__img col-lg-4 col-sm-4">
                                        <img src="{{ $item->base_image->path }}" alt="">
                                    </div>
                                    {!! $item->feature !!}
                                </div>
                                <div class="row quality__camera">
                                    <div class="col-6">
                                        <div class="font-weight-bold quality__text">{{ $item->name }}</div>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" data-toggle="modal" data-target="#modalRegisterService">
                                            Đăng ký ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="menu1">
                <div class="quality__card row">
                    @foreach ($category_services_cloud->services as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="quality__inner">
                                @if ($item->is_hot)
                                    <div class="quality__logo">
                                        <img alt="hot" src="{{ v(theme::url('assets/images/icon/tick hot fpt.png'))}}">
                                    </div>
                                    <div class="quality__star">
                                        <img alt="star" src="{{ v(theme::url('assets/images/icon/star fpt.png'))}}">
                                    </div>
                                @endif
                                <div class="quality__header text-center px-3 pt-4 pb-0">
                                    <h4>{{$item->name}}</h4>
                                    <p class="quality__price"><span class="text-bold">{{number_format($item->price->amount(),0,",",".")}}</span></p>
                                    <p class="m-0 quality__number"><span>VNĐ/ tháng/ 1 Camera</span></p>
                                </div>
                                <div class="quality__body">
                                    {!! $item->feature !!}
                                </div>
                                <div class="quality__footer">
                                    <a href="#" data-toggle="modal" data-target="#modalRegisterService">
                                        Đăng ký ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>