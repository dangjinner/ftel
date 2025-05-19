@for ($i = 1; $i <= 11; $i++)
    <?php
        $chinhsach = 'chinhsach' . $i;
    ?>
    <div class="accordion-box-content">
        <div class="tab-content clearfix">
            <div class="panel-wrap">
                @include('admin.fpt.tabs.support.partials.chinhsach', [
                'label' => trans('fpt::fpt.tabs.support.label_chinhsach'),
                'name' => 'fpt_chinhsach'.$i,
                'chinhsach' => $$chinhsach,
                'i'     => $i
                ])
            </div>
        </div>
    </div>
@endfor
<h3 class="tab-content-title">Bảng giá</h3>
<div class="col-lg-12 col-md-12 col-sm-12 clearfix">
    <div class="form-group">
        <label for="fpt_banggiachinhsach-feature_desc">{{ trans("fpt::fpt.tabs.support.chinhsach_thutuc_desc") }}</label>
        <textarea name="fpt_banggiachinhsach_feature_desc" class="form-control wysiwyg"
            id="fpt_banggiachinhsach-feature_desc">{{ $banggia_chinhsach->feature_desc }}</textarea>
    </div>
</div>

<h3 class="tab-content-title">Thông tin thanh toán</h3>
@for ($i = 1; $i <= 4; $i++)
    <?php
        $chinhsachthanhtoan = 'chinhsachthanhtoan' . $i;
    ?>
    <div class="accordion-box-content">
        <div class="tab-content clearfix">
            <div class="panel-wrap">
                @include('admin.fpt.tabs.support.partials.chinhsach', [
                'label' => trans('fpt::fpt.tabs.support.label_chinhsach'),
                'name' => 'fpt_chinhsachthanhtoan'.$i,
                'chinhsach' => $$chinhsachthanhtoan,
                'i' => $i,
                'tab' => 'thanhtoan'
                ])
            </div>
        </div>
    </div>
@endfor
