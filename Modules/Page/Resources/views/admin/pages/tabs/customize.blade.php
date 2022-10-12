<div class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-4">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#seo" aria-expanded="true" class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-customize" class="pull-left">Customize</span>
                    </a>
                </h4>
            </div>
            @php
                $isActiveChatbox = false;
                $isActiveMenu = false;
                if($page->custom !== null) {
                    foreach(json_decode($page->custom) as $key => $custom) {
                        if($key == 'active_chatbox') {
                        $isActiveChatbox = true;
                        }
                        if($key == 'active_menu') {
                        $isActiveMenu = true;
                        }
                    }
                }
            @endphp
            <div id="customize" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Contact Phone
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[phone_contact]" value="{{ json_decode($page->custom)->phone_contact ?? "" }}" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Contact Zalo
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[zalo_contact]"  value="{{ json_decode($page->custom)->zalo_contact ?? "" }}"  class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Email to receive information
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[email_receive]" value="{{ json_decode($page->custom)->email_receive ?? "" }}" class="form-control" >
                            <p style="font-style: italic; margin-top: 1rem; color: rgb(13, 45, 223)">**Cách gửi CC mail: <span style="color: red">abc@gmail.com, mno@gmail.com, ...</span>  </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Google Sheet Key
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[google_sheet_key]" value="{{ json_decode($page->custom)->google_sheet_key ?? "" }}"  class="form-control" >
                            <p style="font-style: italic; margin-top: 1rem; color: rgb(13, 45, 223)">**Google Sheet Key là đoạn mã trên URL và link đó phải được public</p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Google Sheet Name
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[google_sheet_name]" value="{{ json_decode($page->custom)->google_sheet_name ?? "" }}"  class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Google Sheet Link
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="custom[google_sheet_link]"  value="{{ json_decode($page->custom)->google_sheet_link ?? "" }}"  class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-description" class="col-md-3 control-label text-left">
                            Chat Box Script
                        </label>
                        <div class="col-md-9">
                            <textarea name="custom[chatbox_script]" class="form-control"  rows="10" cols="10">{{ json_decode($page->custom)->chatbox_script ?? "" }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta-description" class="col-md-3 control-label text-left">
                            Active Chat Box
                        </label>
                        <div class="col-md-9">
                            <input type="checkbox" name="custom[active_chatbox]" value="1" @if($isActiveChatbox) checked
                                @endif style="width: 20px; height: 20px" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta-description" class="col-md-3 control-label text-left">
                            Active Menu
                        </label>
                        <div class="col-md-9">
                            <input type="checkbox" name="custom[active_menu]" @if($isActiveMenu) checked @endif
                                value="1" style="width: 20px; height: 20px" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>