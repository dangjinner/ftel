<div class="panel">
    <div class="panel-header">
        <a data-toggle="collapse" href="#chinhsach{{ $tab ?? '' }}{{$i}}" role="button" aria-expanded="false" aria-controls="chinhsach{{$i}}"><h5>{{ $chinhsach->call_to_action_url ?? $label. ' '.$i }} </h5></a>
    </div>
    <div class="collapse" id="chinhsach{{ $tab ?? '' }}{{$i}}">
        <div class="panel-body">
            <div class="clearfix">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                        <div class="form-group">
                            <label for="{{ $name }}-call_to_action_url">{{ trans("fpt::fpt.tabs.support.chinhsach_thutuc_name_title") }}</label>
                            <input name="{{ $name }}_call_to_action_url" class="form-control"
                                id="{{ $name }}-call_to_action_url" value="{{ $chinhsach->call_to_action_url }}" />
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 clearfix">
                        <div class="form-group">
                            <label for="{{ $name }}-feature_desc">{{ trans("fpt::fpt.tabs.support.chinhsach_thutuc_desc") }}</label>
                            <textarea name="{{ $name }}_feature_desc" class="form-control wysiwyg"
                                id="{{ $name }}-feature_desc">{{ $chinhsach->feature_desc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
