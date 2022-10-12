<?php

namespace Themes\Fpt;

use Modules\Media\Entities\File;
use Illuminate\Support\Facades\Cache;

class Banner
{
    public $image;
    public $call_to_action_url;
    public $open_in_new_window;
    public $feature_desc;
    public function __construct($image, $call_to_action_url, $open_in_new_window, $feature_desc)
    {
        $this->image = $image;
        $this->call_to_action_url = $call_to_action_url;
        $this->open_in_new_window = (bool) $open_in_new_window;
        $this->feature_desc = $feature_desc;
    }

    public static function getProductPageBanner()
    {
        return self::findByName('fpt_product_page_banner');
    }

    // Chức năng cá nhân
    public static function getBannerFeature1()
    {
        return self::findByName('fpt_service_banner_canhan1');
    }

    public static function getBannerFeature2()
    {
        return self::findByName('fpt_service_banner_canhan2');
    }

    public static function getBannerFeature3()
    {
        return self::findByName('fpt_service_banner_canhan3');
    }

    public static function getBannerFeature4()
    {
        return self::findByName('fpt_service_banner_canhan4');
    }

    public static function getBannerFeature5()
    {
        return self::findByName('fpt_service_banner_canhan5');
    }

    public static function getBannerFeature6()
    {
        return self::findByName('fpt_service_banner_canhan6');
    }

    public static function getBannerFeature7()
    {
        return self::findByName('fpt_service_banner_canhan7');
    }

    public static function getBannerFeature8()
    {
        return self::findByName('fpt_service_banner_canhan8');
    }

    public static function getBannerFeature9()
    {
        return self::findByName('fpt_service_banner_canhan9');
    }

    public static function getBannerFeature10()
    {
        return self::findByName('fpt_service_banner_canhan10');
    }

    // Chức năng doanh nghiệp
    public static function getBannerFeatureEenterprise1()
    {
        return self::findByName('fpt_service_banner_doanhnghiep1');
    }

    public static function getBannerFeatureEenterprise2()
    {
        return self::findByName('fpt_service_banner_doanhnghiep2');
    }

    public static function getBannerFeatureEenterprise3()
    {
        return self::findByName('fpt_service_banner_doanhnghiep3');
    }

    public static function getBannerFeatureEenterprise4()
    {
        return self::findByName('fpt_service_banner_doanhnghiep4');
    }

    public static function getBannerFeatureEenterprise5()
    {
        return self::findByName('fpt_service_banner_doanhnghiep5');
    }

    public static function getBannerFeatureEenterprise6()
    {
        return self::findByName('fpt_service_banner_doanhnghiep6');
    }

    public static function getBannerFeatureEenterprise7()
    {
        return self::findByName('fpt_service_banner_doanhnghiep7');
    }

    public static function getBannerFeatureEenterprise8()
    {
        return self::findByName('fpt_service_banner_doanhnghiep8');
    }

    public static function getBannerFeatureEenterprise9()
    {
        return self::findByName('fpt_service_banner_doanhnghiep9');
    }

    public static function getBannerFeatureEenterprise10()
    {
        return self::findByName('fpt_service_banner_doanhnghiep10');
    }


    // Chức năng NET + FPT
    public static function getBannerFeatureNetFpt1()
    {
        return self::findByName('fpt_service_banner_netfpt1');
    }

    public static function getBannerFeatureNetFpt2()
    {
        return self::findByName('fpt_service_banner_netfpt2');
    }

    public static function getBannerFeatureNetFpt3()
    {
        return self::findByName('fpt_service_banner_netfpt3');
    }

    public static function getBannerFeatureNetFpt4()
    {
        return self::findByName('fpt_service_banner_netfpt4');
    }

    public static function getBannerFeatureNetFpt5()
    {
        return self::findByName('fpt_service_banner_netfpt5');
    }

    public static function getBannerFeatureNetFpt6()
    {
        return self::findByName('fpt_service_banner_netfpt6');
    }

    public static function getBannerFeatureNetFpt7()
    {
        return self::findByName('fpt_service_banner_netfpt7');
    }

    public static function getBannerFeatureNetFpt8()
    {
        return self::findByName('fpt_service_banner_netfpt8');
    }

    public static function getBannerFeatureNetFpt9()
    {
        return self::findByName('fpt_service_banner_netfpt9');
    }

    public static function getBannerFeatureNetFpt10()
    {
        return self::findByName('fpt_service_banner_netfpt10');
    }


    // Chức năng gói kênh Maxy
    public static function getBannerFeatureGoiMaxy1()
    {
        return self::findByName('fpt_service_banner_goimaxy1');
    }

    public static function getBannerFeatureGoiMaxy2()
    {
        return self::findByName('fpt_service_banner_goimaxy2');
    }

    public static function getBannerFeatureGoiMaxy3()
    {
        return self::findByName('fpt_service_banner_goimaxy3');
    }

    public static function getBannerFeatureGoiMaxy4()
    {
        return self::findByName('fpt_service_banner_goimaxy4');
    }

    public static function getBannerFeatureGoiMaxy5()
    {
        return self::findByName('fpt_service_banner_goimaxy5');
    }

    public static function getBannerFeatureGoiMaxy6()
    {
        return self::findByName('fpt_service_banner_goimaxy6');
    }

    public static function getBannerFeatureGoiMaxy7()
    {
        return self::findByName('fpt_service_banner_goimaxy7');
    }

    public static function getBannerFeatureGoiMaxy8()
    {
        return self::findByName('fpt_service_banner_goimaxy8');
    }

    public static function getBannerFeatureGoiMaxy9()
    {
        return self::findByName('fpt_service_banner_goimaxy9');
    }

    public static function getBannerFeatureGoiMaxy10()
    {
        return self::findByName('fpt_service_banner_goimaxy10');
    }

    public static function getBannerChinhSachBanHangMaxy()
    {
        return self::findByName('fpt_service_banner_goimaxychinhsachbanhang');
    }


    // FPT Play Box
    public static function getBannerFeatureFptPlayBox1()
    {
        return self::findByName('fpt_service_banner_fptplaybox1');
    }

    public static function getBannerFeatureFptPlayBox2()
    {
        return self::findByName('fpt_service_banner_fptplaybox2');
    }

    public static function getBannerFeatureFptPlayBox3()
    {
        return self::findByName('fpt_service_banner_fptplaybox3');
    }

    public static function getBannerFeatureFptPlayBox4()
    {
        return self::findByName('fpt_service_banner_fptplaybox4');
    }

    public static function getBannerFeatureFptPlayBox5()
    {
        return self::findByName('fpt_service_banner_fptplaybox5');
    }

    public static function getBannerFeatureFptPlayBox6()
    {
        return self::findByName('fpt_service_banner_fptplaybox6');
    }

    public static function getBannerFeatureFptPlayBox7()
    {
        return self::findByName('fpt_service_banner_fptplaybox7');
    }

    public static function getBannerFeatureFptPlayBox8()
    {
        return self::findByName('fpt_service_banner_fptplaybox8');
    }

    public static function getBannerFeatureFptPlayBox9()
    {
        return self::findByName('fpt_service_banner_fptplaybox9');
    }

    public static function getBannerFeatureFptPlayBox10()
    {
        return self::findByName('fpt_service_banner_fptplaybox10');
    }

    public static function getBannerGiaThietBi()
    {
        return self::findByName('fpt_service_banner_fptplayboxgiathietbi');
    }

    public static function getTableContentFptPlayBox()
    {
        return self::findByName('fpt_service_banner_table_content_fpt_play_box');
    }


    // FPT Play
    // FPT Play Box
    public static function getBannerFeatureFptPlay1()
    {
        return self::findByName('fpt_service_banner_fptplay1');
    }

    public static function getBannerFeatureFptPlay2()
    {
        return self::findByName('fpt_service_banner_fptplay2');
    }

    public static function getBannerFeatureFptPlay3()
    {
        return self::findByName('fpt_service_banner_fptplay3');
    }

    public static function getBannerFeatureFptPlay4()
    {
        return self::findByName('fpt_service_banner_fptplay4');
    }

    public static function getBannerFeatureFptPlay5()
    {
        return self::findByName('fpt_service_banner_fptplay5');
    }

    public static function getBannerFeatureFptPlay6()
    {
        return self::findByName('fpt_service_banner_fptplay6');
    }

    public static function getBannerFeatureFptPlay7()
    {
        return self::findByName('fpt_service_banner_fptplay7');
    }

    public static function getBannerFeatureFptPlay8()
    {
        return self::findByName('fpt_service_banner_fptplay8');
    }

    public static function getBannerFeatureFptPlay9()
    {
        return self::findByName('fpt_service_banner_fptplay9');
    }

    public static function getBannerFeatureFptPlay10()
    {
        return self::findByName('fpt_service_banner_fptplay10');
    }

    public static function getTableContentFptPlayTienDichVu()
    {
        return self::findByName('fpt_service_banner_fptplaytiendichvu');
    }

    public static function getBannerRegisterOnline()
    {
        return self::findByName('fpt_banner_register_online');
    }
    public static function getBannerHotline()
    {
        return self::findByName('fpt_banner_hotline');
    }

    public static function getBannerLocation()
    {
        return self::findByName('fpt_banner_location');
    }

    // Hỗ trợ - Chính sách thủ tục
    public static function getChinhSach1()
    {
        return self::findByName('fpt_chinhsach1');
    }

    public static function getChinhSach2()
    {
        return self::findByName('fpt_chinhsach2');
    }

    public static function getChinhSach3()
    {
        return self::findByName('fpt_chinhsach3');
    }

    public static function getChinhSach4()
    {
        return self::findByName('fpt_chinhsach4');
    }

    public static function getChinhSach5()
    {
        return self::findByName('fpt_chinhsach5');
    }

    public static function getChinhSach6()
    {
        return self::findByName('fpt_chinhsach6');
    }

    public static function getChinhSach7()
    {
        return self::findByName('fpt_chinhsach7');
    }

    public static function getChinhSach8()
    {
        return self::findByName('fpt_chinhsach8');
    }

    public static function getChinhSach9()
    {
        return self::findByName('fpt_chinhsach9');
    }

    public static function getChinhSach10()
    {
        return self::findByName('fpt_chinhsach10');
    }
    public static function getChinhSach11()
    {
        return self::findByName('fpt_chinhsach11');
    }
    public static function getBangGiaChinhSach()
    {
        return self::findByName('fpt_banggiachinhsach');
    }

    public static function getChinhSachThanhToan1()
    {
        return self::findByName('fpt_chinhsachthanhtoan1');
    }

    public static function getChinhSachThanhToan2()
    {
        return self::findByName('fpt_chinhsachthanhtoan2');
    }

    public static function getChinhSachThanhToan3()
    {
        return self::findByName('fpt_chinhsachthanhtoan3');
    }

    public static function getChinhSachThanhToan4()
    {
        return self::findByName('fpt_chinhsachthanhtoan4');
    }

    public static function getDieuKhoan1()
    {
        return self::findByName('fpt_dieukhoan1');
    }

    public static function getDieuKhoan2()
    {
        return self::findByName('fpt_dieukhoan2');
    }

    //map
    public static function getSettingHiFPTSupport()
    {
        return self::findByName('fpt_settings_hifpt_support');
    }
    public static function getSettingHotlineSaleSupport()
    {
        return self::findByName('fpt_settings_hotline_sale_support');
    }

    public static function getSettingHotlineTechSupport()
    {
        return self::findByName('fpt_settings_hotline_tech_support');
    }

    public static function getSettingEmailSupport()
    {
        return self::findByName('fpt_settings_email_support');
    }

    public static function getSettingLivechatSupport()
    {
        return self::findByName('fpt_settings_livechat_support');
    }

    public static function getSettingFBSupport()
    {
        return self::findByName('fpt_settings_fb_support');
    }
    // End


    public static function getSliderBanners()
    {
        return [
            'banner_1' => self::findByName('fpt_slider_banner_1'),
            'banner_2' => self::findByName('fpt_slider_banner_2'),
        ];
    }

    public static function getThreeColumnFullWidthBanners()
    {
        return [
            'background' => self::findByName('fpt_three_column_full_width_banners_background'),
            'banner_1' => self::findByName('fpt_three_column_full_width_banners_1'),
            'banner_2' => self::findByName('fpt_three_column_full_width_banners_2'),
            'banner_3' => self::findByName('fpt_three_column_full_width_banners_3'),
        ];
    }

    public static function getTwoColumnBanners()
    {
        return [
            'banner_1' => self::findByName('fpt_two_column_banners_1'),
            'banner_2' => self::findByName('fpt_two_column_banners_2'),
        ];
    }

    public static function getThreeColumnBanners()
    {
        return [
            'banner_1' => self::findByName('fpt_three_column_banners_1'),
            'banner_2' => self::findByName('fpt_three_column_banners_2'),
            'banner_3' => self::findByName('fpt_three_column_banners_3'),
        ];
    }

    public static function getOneColumnBanner()
    {
        return self::findByName('fpt_one_column_banner');
    }

    public static function findByName($name)
    {
        return Cache::tags('settings')
            ->rememberForever(md5("fpt_banners.{$name}:" . locale()), function () use ($name) {
                return new self(
                    File::findOrNew(setting("{$name}_file_id")),
                    setting("{$name}_call_to_action_url"),
                    setting("{$name}_open_in_new_window"),
                    setting("{$name}_feature_desc")
                );
            });
    }
}
