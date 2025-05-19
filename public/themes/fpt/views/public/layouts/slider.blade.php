<div class="slider_area slider-one">
    <!-- Single Slider Start -->
    <!-- Single Slider End -->
    <!-- Single Slider Start -->
    @foreach ($slider->slides as $slide)
        @if ($slide->call_to_action_url)
            <div class="single_slider">
                <a href="{{ $slide->call_to_action_url }}"><img src="{{ $slide->file->path }}"
                        alt="{{ $slide->call_to_action_text }}" class="img-fluid"></a>
            </div>
        @else
            <div class="single_slider">
                <img src="{{ $slide->file->path }}" alt="{{ $slide->call_to_action_text }}" class="img-fluid">
            </div>
        @endif
    @endforeach
</div>
