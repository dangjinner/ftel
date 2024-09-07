<?php

namespace Themes\Fpt\Admin;

use Modules\Admin\Ui\Tabs;
use Modules\Admin\Ui\Tab;
use Modules\Tag\Entities\Tag;
use Themes\Fpt\Banner;
use Modules\Menu\Entities\Menu;
use Modules\Page\Entities\Page;
use Modules\Media\Entities\File;
use Modules\Slider\Entities\Slider;
use Illuminate\Support\Facades\Cache;

class FptTabs extends Tabs
{
    /**
     * Make new tabs with groups.
     *
     * @return void
    */

    public function make()
    {
        $this->group('general_settings', trans('fpt::fpt.tabs.group.general_settings'))
            ->active()
            ->add($this->general())
            ->add($this->logo())
            ->add($this->menus())
            ->add($this->footer())
            ->add($this->newsletter())
            ->add($this->features())
            ->add($this->productPage())
            ->add($this->socialLinks())
            ->add($this->chatBox());

        $this->group('feature', trans('fpt::fpt.tabs.group.feature'))
            ->add($this->sectionFeatureCapQuangCaNhan())
            ->add($this->sectionFeatureCapQuangDoanhNghiep())
            ->add($this->sectionFeatureNetFpt())
            ->add($this->sectionFeatureInternetLux())
            ->add($this->sectionFeatureGoiMaxy())
            ->add($this->sectionFeatureFptPlayBox())
            ->add($this->sectionFeatureFptPlay());

         $this->group('register_form', trans('fpt::fpt.tabs.group.register_form'))
            ->add($this->registerFormService());

        $this->group('home_section', trans('fpt::fpt.tabs.group.home_section'))
            ->add($this->section1());

        $this->group('support_section', trans('fpt::fpt.tabs.group.support_section'))
            ->add($this->procedure_instructions())
            ->add($this->privacy_terms())
            ->add($this->location());

        $this->group('setting_seo_for_page', trans('fpt::fpt.tabs.group.setting_seo_for_page'))
            ->add($this->homeSEO())
            ->add($this->supportPrivacyTerms())
            ->add($this->supportTransactionLocation())
            ->add($this->registerOnline())
            ->add($this->news())
            ->add($this->privacyPolicy())
            ->add($this->registerInformation());
    }

    // SEO setting
    private function homeSEO()
    {
        return tap(new Tab('home_seo', trans('fpt::fpt.tabs.seo.home')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'home'
            ]);
        });
    }


    private function supportPrivacyTerms()
    {
        return tap(new Tab('supportPrivacyTerms', trans('fpt::fpt.tabs.seo.supportPrivacyTerms')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'supportPrivacyTerms'
            ]);
        });
    }

    private function supportTransactionLocation()
    {
        return tap(new Tab('supportTransactionLocation', trans('fpt::fpt.tabs.seo.supportTransactionLocation')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'supportTransactionLocation'
            ]);
        });
    }

    private function registerOnline()
    {
        return tap(new Tab('registerOnline', trans('fpt::fpt.tabs.seo.registerOnline')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'registerOnline'
            ]);
        });
    }

    private function news()
    {
        return tap(new Tab('news', trans('fpt::fpt.tabs.seo.news')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'news'
            ]);
        });
    }

    private function privacyPolicy()
    {
        return tap(new Tab('privacyPolicy', trans('fpt::fpt.tabs.seo.privacyPolicy')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'privacyPolicy'
            ]);
        });
    }

    private function registerInformation()
    {
        return tap(new Tab('registerInformation', trans('fpt::fpt.tabs.seo.registerInformation')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.seo.template', [
                'page'  => 'registerInformation'
            ]);
        });
    }


    // End SEO setting



    private function procedure_instructions()
    {
        $data = [];

        for ($i=1; $i <= 11; $i++) {
            $func = 'getChinhSach'.$i;
            $data['chinhsach'.$i] = Banner::$func();
        }

        $data['banggia_chinhsach'] = Banner::getBangGiaChinhSach();

        for($i = 1; $i <= 4; $i++) {
            $func = 'getChinhSachThanhToan'.$i;
            $data['chinhsachthanhtoan'.$i] = Banner::$func();
        }
        // dd($data);
        return tap(new Tab('chinhsach_thutuc', trans('fpt::fpt.tabs.support.chinhsach_thutuc')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.support.chinhsach_thutuc', $data);
        });
    }

    private function privacy_terms()
    {
        $data = [];

        for ($i=1; $i <= 2; $i++) {
            $func = 'getDieuKhoan'.$i;
            $data['dieukhoan'.$i] = Banner::$func();
        }
        // dd($data);
        return tap(new Tab('dieukhoan_baomat', trans('fpt::fpt.tabs.support.dieukhoan_baomat')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.support.dieukhoan_baomat', $data);
        });
    }

    private function location()
    {
        return tap(new Tab('map', trans('fpt::fpt.tabs.support.diadiemgiaodich.title')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.support.contact', [
                'hifptSupport'            => Banner::getSettingHiFPTSupport(),
                'hotlineSaleSupport'      => Banner::getSettingHotlineSaleSupport(),
                'hotlineTechSupport'      => Banner::getSettingHotlineTechSupport(),
                'emailSupport'            => Banner::getSettingEmailSupport(),
                'livechatSupport'         => Banner::getSettingLivechatSupport(),
                'fbSupport'               => Banner::getSettingFBSupport()
            ]);
        });
    }

    private function section1()
    {
        return tap(new Tab('section1', trans('fpt::fpt.tabs.section1.section_title')), function (Tab $tab) {
            $tab->weight(5);
            $tab->view('admin.fpt.tabs.home.section1', [
                'banner'            => Banner::getBannerRegisterOnline(),
                'banner_hotline'    => Banner::getBannerHotline(),
                'banner_location'   => Banner::getBannerLocation()
            ]);
        });
    }

    private function general()
    {
        return tap(new Tab('general', trans('fpt::fpt.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['fpt_slider', 'fpt_copyright_text']);
            $tab->view('admin.fpt.tabs.general', [
                'pages' => $this->getPages(),
                'sliders' => $this->getSliders(),
                'homes' => $this->getHomes()
            ]);
        });
    }

    private function getHomes()
    {
        $homes = [];
        // dd(app('stylist'));
        // dd(\File::glob(app('stylist')->current()->getPath() . '/views/public/home/*.blade.php'));
        foreach (\File::glob(app('stylist')->current()->getPath() . '/views/public/home/*.blade.php') as $filename) {
            $name = basename($filename,'.blade.php');
            $homes[$name] = $name;
        }
        return $homes;
    }

    private function getPages()
    {
        return Page::all()->pluck('name', 'id')
            ->prepend(trans('fpt::fpt.form.please_select'), '');
    }

    private function getSliders()
    {
        return Slider::all()->sortBy('name')->pluck('name', 'id')
            ->prepend(trans('fpt::fpt.form.please_select'), '');
    }

    private function logo()
    {
        return tap(new Tab('logo', trans('fpt::fpt.tabs.logo')), function (Tab $tab) {
            $tab->weight(10);
            $tab->view('admin.fpt.tabs.logo', [
                'favicon' => $this->getMedia(setting('fpt_favicon')),
                'headerLogo' => $this->getMedia(setting('fpt_header_logo')),
                'footerLogo' => $this->getMedia(setting('fpt_footer_logo')),
                'mailLogo' => $this->getMedia(setting('fpt_mail_logo')),
            ]);
        });
    }

    private function menus()
    {
        return tap(new Tab('menus', trans('fpt::fpt.tabs.menus')), function (Tab $tab) {
            $tab->weight(15);

            $tab->fields([
                'fpt_primary_menu',
                'fpt_category_menu',
                'fpt_footer_menu',
                'fpt_footer_menu_title',
            ]);

            $tab->view('admin.fpt.tabs.menus', [
                'menus' => $this->getMenus(),
            ]);
        });
    }

    private function getMenus()
    {
        return Menu::all()->pluck('name', 'id')
            ->prepend(trans('fpt::fpt.form.please_select'), '');
    }

    private function footer()
    {
        return tap(new Tab('footer', trans('fpt::fpt.tabs.footer')), function (Tab $tab) {
            $tab->weight(17);
            $tab->view('admin.fpt.tabs.footer', [
                'tags' => Tag::list(),
                'acceptedPaymentMethodsImage' => $this->getMedia(setting('fpt_accepted_payment_methods_image')),
                'footerBanner' => $this->getMedia(setting('fpt_footer_banner')),
            ]);
        });
    }

    private function getMediaFiles($fileIds) {
        if($fileIds == null) {
            $fileIds = [];
        }
        $files = File::whereIn('id', $fileIds)->get();
        return $files;
    }

    private function newsletter()
    {
        if (! setting('newsletter_enabled')) {
            return;
        }

        return tap(new Tab('newsletter', trans('fpt::fpt.tabs.newsletter')), function (Tab $tab) {
            $tab->weight(18);
            $tab->view('admin.fpt.tabs.newsletter', [
                'newsletterBgImage' => $this->getMedia(setting('fpt_newsletter_bg_image')),
            ]);
        });
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function features()
    {
        return tap(new Tab('features', trans('fpt::fpt.tabs.features')), function (Tab $tab) {
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.features');
        });
    }

    private function productPage()
    {
        // dd(Banner::getProductPageBanner());

        return tap(new Tab('product_page', trans('fpt::fpt.tabs.product_page')), function (Tab $tab) {
            $tab->weight(22);
            $tab->view('admin.fpt.tabs.product_page', [
                'banner' => Banner::getProductPageBanner(),
            ]);
        });

    }

    private function socialLinks()
    {
        return tap(new Tab('social_links', trans('fpt::fpt.tabs.social_links')), function (Tab $tab) {
            $tab->weight(25);

            $tab->fields([
                'fpt_fb_link',
                'fpt_twitter_link',
                'fpt_instagram_link',
                'fpt_linkedin_link',
                'fpt_pinterest_link',
                'fpt_gplus_link',
                'fpt_youtube_link',
            ]);

            $tab->view('admin.fpt.tabs.social_links');
        });
    }

    private function chatBox()
    {
        return tap(new Tab('chat_box', 'Chat Box'), function (Tab $tab) {
            $tab->weight(27);
            $tab->view('admin.fpt.tabs.chat_box');
        });
    }

    private function sectionFeatureInternetLux()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerInternetLux'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'internet_lux_';
        // dd($data);
        return tap(new Tab('features_internet_lux', trans('fpt::fpt.tabs.internet_lux')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.internet_lux', $data);
        });
    }


    private function sectionFeatureCapQuangCaNhan()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeature'.$i;
            $data['banner'.$i] = Banner::$func();
        }
         $data['tab_name'] = 'canhan';
        // dd($data);
        return tap(new Tab('features_canhan', trans('fpt::fpt.tabs.capquang_canhan')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.capquang_canhan', $data);
        });
    }

    private function sectionFeatureCapQuangDoanhNghiep()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeatureEenterprise'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'doanhnghiep';
        // dd($data);
        return tap(new Tab('features_doanhnghiep', trans('fpt::fpt.tabs.capquang_doanhnghiep')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.capquang_canhan', $data);
        });
    }

    private function sectionFeatureNetFpt()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeatureNetFpt'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'netfpt';
        // dd($data);
        return tap(new Tab('features_netfpt', trans('fpt::fpt.tabs.netfpt')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.capquang_canhan', $data);
        });
    }

    private function sectionFeatureGoiMaxy()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeatureGoiMaxy'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'goimaxy';
        $data['banner_chinhsachbanhang'] = Banner::getBannerChinhSachBanHangMaxy();
        // dd($data);
        return tap(new Tab('features_maxy', trans('fpt::fpt.tabs.goimaxy')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.truyenhinh_fpt', $data);
        });
    }

    private function sectionFeatureFptPlayBox()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeatureFptPlayBox'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'fptplaybox';
        $data['table_desc'] = Banner::getTableContentFptPlayBox();
        $data['banner_giathietbi'] = Banner::getBannerGiaThietBi();
        return tap(new Tab('features_fptplaybox', trans('fpt::fpt.tabs.fptplaybox')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.fptplaybox', $data);
        });
    }

    private function sectionFeatureFptPlay()
    {
        $data = [];

        for ($i=1; $i <= 10; $i++) {
            $func = 'getBannerFeatureFptPlay'.$i;
            $data['banner'.$i] = Banner::$func();
        }
        $data['tab_name'] = 'fptplay';
        $data['table_desc'] = Banner::getTableContentFptPlayTienDichVu();
        return tap(new Tab('features_fptplay', trans('fpt::fpt.tabs.fptplay')), function (Tab $tab) use ($data){
            $tab->weight(20);
            $tab->view('admin.fpt.tabs.fptplay', $data);
        });
    }

     private function registerFormService()
    {
        return tap(new Tab('register_form_service', trans('fpt::fpt.tabs.register_form_service')), function (Tab $tab) {
            $tab->weight(1);
            $tab->view('admin.fpt.tabs.register_form.service');
        });
    }

}
