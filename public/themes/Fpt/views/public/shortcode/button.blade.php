<a href="{{ $shortcode->link }}" class="shortc-button {{ $shortcode->size.' '. $shortcode->color }}"
    {{ $shortcode->target == 'false' || !$shortcode->target ? '' :  'target="_blank"'}}
    >
    @if ($shortcode->icon)
        <i class="fa {{ $shortcode->icon }}"></i>
    @endif
    {!! $content !!}
</a>
