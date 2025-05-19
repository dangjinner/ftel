<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('admin.fpt.tabs.partials.single_banner', [
                'label' => trans('fpt::fpt.form.product_page_banner'),
                'name' => 'fpt_product_page_banner',
                'banner' => $banner,
            ])
        </div>
    </div>
</div>

