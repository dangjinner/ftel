
@include('media::admin.image_picker.single', [
    'title' => 'Footer Banner',
    'inputName' => 'fpt_footer_banner',
    'file' => $footerBanner,
])
{{ Form::text('footer_banner_url', 'Banner URL', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
<div class="media-picker-divider"></div>

{{ Form::wysiwyg('footer_col_1', 'Column 1', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('footer_col_2', 'Column 2', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('footer_col_3', 'Column 3', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('footer_col_4', 'Socials', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
@if(in_array(auth()->user()->email , ['admin12345@gmail.com', 'tienlv2@fpt.com.vn']))
    {{ Form::wysiwyg('footer_copyright', 'Copyright', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
@endif
{{ Form::text('footer_col_5_title', 'Column 5 Title', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('footer_col_5_images', 'Column 5 Images', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}

<div class="media-picker-divider"></div>

{{ Form::wysiwyg('footer_col_6', 'Column 6', $errors, $settings, ['labelCol' => 2, 'required' => true]) }}
