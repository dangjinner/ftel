<div class="row">
    <div class="col-md-8">
        @for($i = 1; $i <= 10; $i++) 
         {{ Form::text('translatable[register_form_service_option_'.$i.']', 'Service '.$i, $errors, $settings) }}
        @endfor
    </div>
</div>
