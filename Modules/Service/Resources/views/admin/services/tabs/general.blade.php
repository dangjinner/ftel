{{ Form::text('name', trans('service::attributes.name'), $errors, $service, ['labelCol' => 2, 'required' => true]) }}
{{ Form::select('category_service_id', trans('service::attributes.category_service'), $errors, $categories_service,
$service, ['labelCol' => 2, 'class' => 'selectize prevent-creation']) }}
<div class="form-group"><label for="title" class="col-md-2 control-label text-left">
    {{trans('service::attributes.title')}}
</label>
    <div class="col-md-10"><textarea name="title" class="form-control " id="title"  labelcol="2"
          >{!! $service->title !!}</textarea>
        </div>
</div>
{{ Form::checkbox('is_show_title', trans('service::attributes.is_show_title'), 'Show/Hide Title', $errors, $service, ['labelCol' => 2]) }}
{{ Form::wysiwyg('feature', trans('service::attributes.feature'), $errors, $service, ['labelCol' => 2, 'required' =>
true]) }}
{{ Form::wysiwyg('bonus', trans('service::attributes.bonus'), $errors, $service, ['labelCol' => 2, 'required' =>
false]) }}
{{ Form::text('bandwidth', trans('service::attributes.bandwidth'), $errors, $service, ['labelCol' => 2]) }}
{{ Form::checkbox('is_hot', trans('service::attributes.is_hot'), null, $errors, $service, ['labelCol' => 2]) }}
{{ Form::checkbox('status', trans('service::attributes.status'), 'Show/Hide this service', $errors, $service, ['labelCol' => 2]) }}

@push('scripts')
<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'title' , {
   });

   CKEDITOR.config.font_names = 'Board of Directors W00 Bold It;' +
    'Arial/Arial, Helvetica, sans-serif;' +
	'Comic Sans MS/Comic Sans MS, cursive;' +
	'Courier New/Courier New, Courier, monospace;' +
	'Georgia/Georgia, serif;' +
	'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
	'Tahoma/Tahoma, Geneva, sans-serif;' +
	'Times New Roman/Times New Roman, Times, serif;' +
	'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
	'Verdana/Verdana, Geneva, sans-serif';

</script>
@endpush
