<?php
    if( !function_exists('getColorClass' )){
        function getColorClass($index)
        {
            switch ($index) {
                case 1:
                    return 'blue';
                case 2:
                    return 'oranges';
                case 3:
                    return 'green';
                case 4:
                    return 'purple';
                case 5:
                    return 'yellow_o';
                case 6:
                    return 'red_p';
                default:
                    return '';
            }
        }
    }
?>
<section class="searchcity select-province-pricing">
    <div class="container">
        <div class="row">
            <div class="page-amount col-lg-4">
                <i class="fa fas far fa-map-marker"></i>Khu vực đang xem:
            </div>
            <div class="col-lg-4 styled-select">
                <select name="tinh1" id="tinh1" class="select-province">
                    <option value="">-- Chọn --</option>
                    @foreach ($provinces as $key => $value)
                    <option value="{{ url()->current() .'?'. 'locationId='.$key}}"
                       {{ request()->get('locationId') ? '' : ($key == $shortcode->provinces_id ? 'selected' : '') }}  {{ request()->get('locationId') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</section>

<div class="pricing--4 slick-custom slick-custom-default">
    <?php
        $index = 1;
    ?>
    @foreach ($services as $item)
    <div class="pricing__col {{ getColorClass($index) }}">
        <div class="pricing__inner">
            @if ($item->base_image_icon->path)
            @php
            $price = number_format($item->price->amount(), 0,",",".");
            if($area_id != null && $item->areas($area_id)->count() > 0){
                if($item->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area_discount){
                    $price = number_format($item->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area_discount,0,",",".");
                }else{
                    $price = number_format($item->areas($area_id)->orderBy('price_area_discount','ASC')->first()->pivot->price_area,0,",",".");
                }
            }else{
                $price = number_format($item->price->amount(),0,",",".");
            }
            @endphp
            <div class="top">
                <div>
                    <div class="img-combo">
                        <span><img alt="{{$item->name}}" src="{{ $item->base_image->path }}"></span>
                    </div>
                    <div class="price">
                        <span class="img-package">
                            <img src="{{ $item->base_image_icon->path }}" alt="net-ico-100.png">
                        </span>
                        <p><b>{{$item->bandwidth}}</b>Mbps</p>
                    </div>
                </div>
            </div>
            {!! sprintf($item->feature, ($price . ' đ')) !!}
            @else
            <div class="top">
                <div>
                    <div class="img-combo"><span><img alt="Combo FPT 25MB" src="{{ $item->base_image->path }}"></span>
                    </div>
                    <div class="price">
                        @if($area_id != null)
                            @if ($item->areas($area_id)->count() > 0)
                                @if ($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area_discount)
                                    <h4>{{ number_format($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area_discount,0,",",".") }}
                                    </h4>
                                @else
                                    <h4>{{ number_format($item->areas($area_id)->orderBy('price_area','ASC')->first()->pivot->price_area,0,",",".") }}
                                    </h4>
                                @endif
                            @else
                                <h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>
                            @endif
                        @else
                            <h4>{{ number_format($item->price->amount(),0,",",".") }}</h4>
                        @endif
                        <span>vnđ/ tháng</span>
                        <p><b>{{ $item->bandwidth }}</b>Mbps</p>
                    </div>
                </div>
            </div>
            {!! $item->feature !!}
            @endif
            {{-- {!! $item->feature !!} --}}
            <div class="bottom">
                <p>Mức giá trên đã bao gồm VAT. Giá này sẽ thay đổi theo khu vực, theo từng thời điểm.</p>
                <a href="#" data-toggle="modal" data-target="#modalRegisterService">Đăng ký ngay</a>
            </div>
        </div>
    </div>
    <?php
        $index++;
    ?>
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#tinh1').select2();
    });
</script>
