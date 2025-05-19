@for ($i = 1; $i <= 10; $i++) <?php
    $banner = 'banner' . $i;
?> <div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('admin.fpt.tabs.partials.tiendichvu_fptplay', [
            'label' => trans('fpt::fpt.form.capquang_canhan'),
            'name' => 'fpt_service_banner_'.$tab_name.$i,
            'banner' => $$banner,
            'i' => $i
            ])
        </div>
    </div>
    </div>
    @endfor
    <div class="accordion-box-content">
        <div class="tab-content clearfix">
            <div class="panel-wrap">
                @include('admin.fpt.tabs.partials.chinhsachbanhang_maxy', [
                'label' => trans('fpt::fpt.form.tiendichvu_fptplay'),
                'name' => 'fpt_service_banner_fptplaytiendichvu',
                'banner_chinhsachbanhang' => $table_desc
                ])
            </div>
        </div>
    </div>
