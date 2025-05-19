<div class="box {{ $shortcode->type .' '. $shortcode->align . ' ' . $shortcode->class }}" style="width:{{ $shortcode->width }}">
    <div class="box-inner-block">
        <i class="{{ $class }}"></i>
        <div class="">
            {!! $content !!}
        </div>
    </div>
</div>
