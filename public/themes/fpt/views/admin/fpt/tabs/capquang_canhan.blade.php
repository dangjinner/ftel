
@for ($i = 1; $i <= 10; $i++)
    <?php
        $banner = 'banner' . $i;
    ?>
    <div class="accordion-box-content">
        <div class="tab-content clearfix">
            <div class="panel-wrap">
                @include('admin.fpt.tabs.partials.single_banner_featured', [
                'label' => trans('fpt::fpt.form.capquang_canhan'),
                'name' => 'fpt_service_banner_'.$tab_name.$i,
                'banner' => $$banner,
                'i'     => $i
                ])
            </div>
        </div>
    </div>
@endfor
