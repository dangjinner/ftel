<div class="row">
    <div class="col-md-8">
        {{ Form::text('translatable[fpt_navbar_text]', trans('fpt::attributes.fpt_navbar_text'), $errors, $settings) }}
        {{ Form::select('fpt_primary_menu', trans('fpt::attributes.fpt_primary_menu'), $errors, $menus, $settings) }}
        {{ Form::select('fpt_category_menu', trans('fpt::attributes.fpt_category_menu'), $errors, $menus, $settings) }}
        {{ Form::select('fpt_menu_internet_fpt', trans('fpt::attributes.fpt_menu_internet_fpt'), $errors, $menus, $settings) }}
        {{ Form::select('fpt_menu_product_service', trans('fpt::attributes.fpt_menu_product_service'), $errors, $menus, $settings) }}
        {{ Form::text('translatable[fpt_footer_menu_one_title]', trans('fpt::attributes.fpt_footer_menu_one_title'), $errors, $settings) }}
        {{ Form::select('fpt_footer_menu_one', trans('fpt::attributes.fpt_footer_menu_one'), $errors, $menus, $settings) }}
        {{ Form::text('translatable[fpt_footer_menu_two_title]', trans('fpt::attributes.fpt_footer_menu_two_title'), $errors, $settings) }}
        {{ Form::select('fpt_footer_menu_two', trans('fpt::attributes.fpt_footer_menu_two'), $errors, $menus, $settings) }}
    </div>
</div>
