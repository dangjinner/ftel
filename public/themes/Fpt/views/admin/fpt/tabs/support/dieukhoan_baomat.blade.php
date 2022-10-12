@for ($i = 1; $i <= 2; $i++)
<?php
    $chinhsach = 'dieukhoan' . $i;
?>
<div class="accordion-box-content">
    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('admin.fpt.tabs.support.partials.chinhsach', [
            'label' => trans('fpt::fpt.tabs.support.label_dieukhoan_baomat'),
            'name' => 'fpt_dieukhoan'.$i,
            'chinhsach' => $$chinhsach,
            'i' => $i,
            'tab'   => 'dieukhoan'
            ])
        </div>
    </div>
</div>
@endfor
