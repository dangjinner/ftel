<?php

namespace Modules\Page\Http\Controllers;

use Mail;
use Validator;
use Response;
use Modules\Core\Entities\District;
use Modules\Page\Entities\Page;
use Modules\Post\Entities\Post;
use Modules\Media\Entities\File;
use Themes\Fpt\Emails\SendMail;
use Modules\Slider\Entities\Slider;
use Modules\Service\Entities\Service;
use Modules\CategoryService\Entities\CategoryService;

use Modules\Group\Entities\Group;
use Illuminate\Http\Request;
use Themes\Fpt\Banner;
use Modules\Menu\Entities\Menu;

use SEO;
use SEOMeta;

use Artesaos\SEOTools\Facades\OpenGraph;
use DB;
use Modules\Option\Entities\Option;
use Modules\Category\Entities\Category;
use Modules\Province\Entities\Province;
use GuzzleHttp\Client;
use Modules\Page\Http\Requests\RegisterRequest;
use Modules\Area\Entities\AreaProvince;
use Google_Client;
use Google_Service_Sheets;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Area\Entities\Area;
use Modules\Area\Entities\AreaService;
use Modules\CustomPage\Entities\CustomPage;
use Modules\Page\Entities\PageTranslation;
use Modules\StoreBranch\Entities\StoreBranch;
use Themes\Fpt\Http\Services\GoogleSheet;
use Themes\Fpt\Http\Services\GoogleSheetAdz;
use Themes\Fpt\Http\Services\GoogleSheetAdsen;

class PageController
{
    private $perPage;
    protected $client;
    protected $keyCatSupport;
    protected $google_sheet;
    protected $google_sheet_adz;

    protected $slug1 = [
        'lap-dat-adsl-fpt-tang-modem-wifi',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-2-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-3-2015',
        'lap-mang-fpt-va-truyen-hinh-fpt-xuan-2015',
        'cac-goi-cuoc-internet-adsl',
        'goi-dich-vu-mega-save',
        'goi-dich-vu-mega-you',
        'lap-mang-fpt-mien-phi-huyen-tu-liem',
        'bao-gia-adsl',
        'fiber-me',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-5-2015																								"',
        'goi-dich-vu-mega-me',
        'fiber-home',
        'cap-quang-fpt-goi-fiber-play-goi-cuoc-khuyen-mai-danh-cho-doi-thu',
        'fiber-public-50mbps',
        'fiber-play-50mbps',
        'fiber-business-35mbps',
        'fiber-public-goi-cuoc-game-internet-danh-cho-doi-thu-canh-tranh',
        'fiber-family-fpt',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-2-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-3-2015',
        'khuyen-mai-lap-dat-mang-fpt-thang-4-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-5-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-thang-6-2015',
        'khuyen-mai-lap-mang-adsl-fpt-thang-6-2015',
        'khuyen-mai-lap-dat-truyen-hinh-fpt-thang-6-2015',
        'khuyen-mai-lap-mang-cap-quang-fpt-gia-re-thang-7-2015',
        'khuyen-mai-lap-mang-wifi-fpt-thang-7-2015',
        'khuyen-mai-lap-mang-internet-adsl-fpt-thang-7-2015',
        'dang-ky-cap-quang-fpt-cho-quan-game-va-doanh-nghiep-thang-8-2015',
        'lap-mang-internet-adsl-fpt-thang-8-2015',
        'khuyen-mai-lap-mang-wifi-fpt-thang-8-2015',
        'dang-ky-cap-quang-fpt-ha-noi-gia-re-thang-7-2015',
        'dang-ky-cap-quang-fpt-hcm-gia-re-thang-7-2015',
        'khuyen-mai-sieu-khung-tai-fpt-binh-duong-thang-9-2015',
        'dang-ky-cap-quang-fpt-cho-doanh-nghiep-thang-9',
        'lap-mang-wifi-fpt-thang-9',
        'lap-mang-cap-quang-fpt-gia-re-thang-10-2015',
        'khuyen-mai-lap-mang-fpt-tai-da-lat-thang-92015',
        'uu-dai-lon-lap-cap-quang-fpt-chao-nam-moi-2016',
        'uu-dai-lap-truyen-hinh-fpt-thang-12016',
        'khuyen-mai-goi-combo-internet-va-truyen-hinh-fpt-cuc-soc-chao-xuan-2016',
        'uu-dai-lap-dat-truyen-hinh-fpt-thang-62016',
        'combo-internet-va-truyen-hinh-fpt-bung-no-trong-thang-5-2016',
        'khuyen-mai-cuc-chat-cap-quang-fpt-thang-52016',
        'uu-dai-lap-mang-cap-quang-fpt-thang-42016',
        'uu-dai-lon-lap-dat-combo-internet-va-truyen-hinh-fpt-thang-82016',
        'uu-dai-lap-mang-cap-quang-fpt-thang-82016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-72016',
        'khuyen-mai-internet-fpt-quan-hoang-mai-thang-6-2016',
        'internet-va-truyen-hinh-fpt-dong-hanh-cung-euro-2016',
        'uu-dai-lap-mang-fpt-mung-sinh-nhat-fpt-thang-92016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-92016',
        'khuyen-mai-combo-internet-truyen-hinh-fpt-thang-92016',
        'dai-tiec-khuyen-mai-mung-sinh-nhat-fpt',
        'uu-dai-dac-biet-combo-internet-va-truyen-hinh-fpt-thang-102016',
        'giam-gia-cuoc-lap-mang-fpt-quan-bac-tu-liem-thang-102016',
        'khuyen-mai-lap-mang-fpt-quan-nam-tu-liem-thang-102016',
        'combo-internet-va-truyen-hinh-fpt-khuyen-mai-thang-112016',
        'uu-dai-lap-mang-fpt-tai-ha-noi-don-nam-moi-dinh-dau-2017',
        'uu-dai-lap-cap-quang-fpt-ha-noi-thang-22017-tang-4-thang-cuoc',
        'fpt-play-box-2018-box-4k-bien-tivi-thuong-thanh-smart-tivi',
        'fpt-play-box-2018-qua-chat-ring-ngay-tang-thay-co',
        'khuyen-mai-lap-fpt-play-box-2020',
    ];

    protected $slug2 = [
        'lap-dat-truyen-hinh-fpt-play-hd',
        'khuyen-mai-lap-dat-truyen-hinh-fpt-play-hd',
        'dang-ky-truyen-hinh-fpt-rinh-xe-sh-5-iphone-6-khuyen-mai-thang-12',
        'truyen-hinh-fpt-thang-2-2015-khuyen-mai-cuc-soc',
        'lap-mang-fpt-va-truyen-hinh-fpt-xuan-2015',
    ];

    protected $slug3 = [
        'can-ban-gap-can-ho-118-32m2-tai-golden-palace-tri-gia-re-nhan-nha-ngay',
        'bai-tho-tieng-bien-cua-nguoi-linh-dao-lay-dong-trieu-trai-tim',
        'fpt-bo-nhiem-hai-ptgd-phu-trach-toan-cau-hoa',
        'ngay-30-07-2014-su-co-dut-cap-bien-quoc-te-aag-se-khac-phuc-xong',
        'ca-si-le-roi-rung-chuyen-lang-showbiz-cu-dan-mang-yeu-hay-ghet',
        'event-tuyen-dung-cuoi-cung-cua-fpt-telecom-trong-nam-2014',
        'chinh-chu-can-ban-can-ho-c-11-08-tai-golden-palace-tri',
        'ban-tin-3-ky-thi-chinh-thuc-bat-dau-trang-fpt-2014',
        'nguoi-ftel-tich-cuc-tham-gia-thi-trang-fpt-2014',
        'ai-se-thang-manchester-chelsea-ke-tam-lang-nguoi-nua-can',
        'het-f-a-nho-internet',
        'chung-cu-c14-bo-cong-ban-gia-re-nhan-nha-ngay',
        'vff-ke-hanh-hung-cdv-viet-nam-phai-bi-trung-tri',
        'khi-mot-ai',
        '15-nam-fyt-qua-nhung-dau-son',
        'chuc-mung-ngay-quoc-te-phu-nu-8-3-toi-chi-em-fpt',
        'cap-quang-aag-lai-dut-vao-sang-23-4-2015',
        'mu-chelsea-nghet-tho-phut-bu-gio-tren-truyen-hinh-fpt',
        'ban-can-ho-65-1-m2-tang-09-toa-ct12b-tai-chung-cu-kim-van-kim-lu',
        'ban-yeu-quy-khong-biet-ban-lua-chon-kieu-song-nao-day',
        'fpt-telecom-chinh-thuc-lam-viec-7-ngay-tuan-tu-ngay-01-06-2015',
    ];

    protected $slugHomeNew = [
        'khuyen-mai-lap-mang-fpt-fpt-telecom',
        'khuyen-mai-lap-mang-fpt-ha-noi',
        'lap-mang-cap-quang-fpt-tai-tt-thanh-xuan-bac-fpt-thanh-x-uan',
        'cau-hoi-truyen-hinh-fpt-vtvcab-k-va-nhung-danh-gia-cua-nguoi-tieu-dung',
        'lap-dat-cap-quang-fpt-tai-me-tri-fpt-nam-tu-liem',
        'fpt-telecom-canh-bao-website-gia-mao',
        'lap-dat-internet-fpt-phuong-mai-dich-cau-giay',
        'cap-quang-fpt-public-danh-cho-quan-game',
        'truyen-hinh-fpt-nhung-chuong-trinh-danh-cho-thieu-nhi',
        'lap-mang',
        'update-phim-bom-tan-thang-12-voi-truyen-hinh-fpt',
        'ban-tin-fpt-play-box',
        'khuyen-mai-dac-biet-goi-combo-internet-va-truyen-hinh-fpt-thang-10',
        'lap-mang-fpt-tay-ho',
        'lap-mang-fpt-nam-tu-liem',
        'goi-dich-vu-mega-me-lap-mang-fpt',
        'lap-mang-fpt-duong-bo-song-quan-hoacau-giay-ha-noi',
        'l',
        'uu-dai-lap-mang-cap-quang-fpt-danh-cho-sinh',
        'thanh-toan',
        'tai-khoan',
        'ightbox',
        'homepage-blog-layout',
        'gioi-thieu-ve-fpt-telecom',
        'gio-hang',
        'cua-hang',
        'columns',
        'ca-si-le-roi-rung-chuyen-lang-showbiz-cu-dan-mang-yeu-hay-ghet',
        '18328-2',
    ];

    public function __construct(GoogleSheet $google_sheet, GoogleSheetAdz $google_sheet_adz, GoogleSheetAdsen $google_sheet_adsen)
    {
        $this->perPage = 15;
        $this->keyCatSupport = [];
        $this->google_sheet = $google_sheet;
        $this->google_sheet_adz = $google_sheet_adz;
        $this->google_sheet_adsen = $google_sheet_adsen;
    }

    public function redirect($slug2)
    {
        $array = [
            '221-2',
            'boxes',
            'blog-list-layout',
            'best-reviews',
            'authors',
            'lap-mang-fpt-an-giang/feed',
            'khuyen-mai-internet-dien-bien-hoa-mang-xuyen-bien-gioi/feed',
            'dang-ky-cap-quang-fpt-pho-an-xa-ba-dinh-ha-noi/feed',
            'homepage-blog-layout/page/9',
            'blog-list-layout/page/6',
            'author/tienlv2/page/31',
            'truyen-hinh-fpt-chuong-trinh-danh-cho-thieu-nhi/feed',
            'lap-mang-fpt/feed',
        ];
        if (in_array($slug2, $array)) {
            return redirect()->route('home');
        }
    }

    /**
     * Display page for the slug.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if ($slug == 'lap-mang-cap-quang-fpt-gia-re-toan-quoc') {
            return redirect()->route('pages.news.show', ['slug' => 'lap-mang-cap-quang-fpt-gia-re']);
        }

        // if ($slug == 'fpt-play-hd') {
        //     return redirect()->route('pages.maxyTv');
        // }

        if (request()->get('fb_comment_id')) {
            return redirect()->route('pages.news.show', ['slug' => $slug]);
        }

        if (in_array($slug, $this->slugHomeNew)) {
            return redirect()->route('home');
        }

        if (in_array($slug, $this->slug1)) {
            return redirect()->route('pages.individualFiber1');
        }

        if (in_array($slug, $this->slug2)) {
            return redirect()->route('pages.maxyTv');
        }

        if (in_array($slug, $this->slug3)) {
            return redirect()->route('pages.news');
        }
        $isPostSlug = true;
        $page = Post::withoutGlobalScope('active')->where('slug', $slug)->first();
        if ($page == null) {
            $page = Page::withoutGlobalScope('active')->where('slug', $slug)->firstOrFail();
            $isPostSlug = false;
        }
        if ($page == null) {
            return redirect('https://ftel.vn/', 301);
        }
        SEO::setTitle($page->meta->meta_title);
        SEO::setDescription($page->meta->meta_description);
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($page->logo->path ?? "");
        SEO::twitter()->setSite(route('home'));
        OpenGraph::addImage($page->logo->path ?? "");

        $data['page'] = $page;
        $categories = [];
        if ($isPostSlug) {
            $categories = $page->groups()->get()->pluck('id');
            if (count($categories) == 0) {
                $data['post_related'] = Post::desc()->get()->filter(function ($post) use ($page) {
                    return $post->id != $page->id;
                })->take(3);
            } else {
                $data['post_related'] = Post::desc()->whereHas('groups', function ($category) use ($categories) {
                    return $category->whereIn('id', $categories);
                })->get()->filter(function ($product) use ($page) {
                    return $product->id != $page->id;
                })->take(3);
            }
            $data['title'] = $page->name;
            return view('public.pages.show', $data);
        } else {
            return view('public.pages.custom_page', $data);
        }
 
        
    }

    public function contact()
    {

        SEO::setTitle(setting('meta_title_of_supportTransactionLocation') ?? 'FPT Telecom - Hỗ trợ - Liên hệ 24/7 - Điểm giao dịch');
        SEO::setDescription(setting('meta_description_of_supportTransactionLocation') ?? 'FPT Telecom - Hỗ trợ - Liên hệ 24/7 - Điểm giao dịch');
        SEOMeta::addKeyword(setting('meta_keyword_of_supportTransactionLocation') ?? 'FPT Telecom - Hỗ trợ - Liên hệ 24/7 - Điểm giao dịch');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        // $data['title'] = 'FPT Telecom - Hỗ trợ - Liên hệ 24/7 - Điểm giao dịch';
        $data['provinces'] = Province::all()->pluck('name', 'id');
        // dd($data['provinces']);
        return view('public.pages.support.contact', $data);
    }

    public function getStoreBrach()
    {
        return StoreBranch::all();
    }

    // Hỗ trợ - Hướng dẫn sử dụng - Truyền hình FPT
    public function fptTelevision()
    {
        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Truyền hình FPT';
        $group = Group::findOrFail(271);
        $data['posts'] = $group->posts()->get();

        SEO::setTitle($group->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Truyền hình FPT');
        SEO::setDescription($group->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Truyền hình FPT');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Truyền hình FPT');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.support.information_support.television_fpt', $data);
    }

    public function camera()
    {
        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Camera';
        $group = Group::findOrFail(272);
        $data['posts'] = $group->posts()->get();

        SEO::setTitle($group->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Camera');
        SEO::setDescription($group->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Camera');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Camera');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.support.information_support.camera', $data);
    }

    public function fptPlaybox()
    {
        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Play Box';
        $group = Group::findOrFail(273);
        $data['posts'] = $group->posts()->get();

        SEO::setTitle($group->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Play Box');
        SEO::setDescription($group->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Play Box');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - FPT Play Box');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.support.information_support.fpt_playbox', $data);
    }

    public function hiFpt()
    {
        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Hi FPT';
        $group = Group::findOrFail(274);
        $data['posts'] = $group->posts()->get();

        SEO::setTitle($group->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Hi FPT');
        SEO::setDescription($group->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Hi FPT');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng - Hi FPT');
        SEO::twitter()->setSite(route('home'));


        return view('public.pages.support.information_support.hi_fpt', $data);
    }
    // end

    public function userManualCat($slug)
    {
        $data['groups'] = Group::findOrFail(270)->children()->get();
        $data['slug'] = $slug;
        $categories = Group::where('slug', $slug)->firstOrFail();

        SEO::setTitle($categories->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng -  ' . $categories->name . '');
        SEO::setDescription($categories->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng -  ' . $categories->name . '');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($categories->logo->path);
        OpenGraph::addImage($categories->logo->path);
        SEOMeta::addKeyword($categories->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng -  ' . $categories->name . '');
        SEO::twitter()->setSite(route('home'));


        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn sử dụng -  '. $categories->name .'';
        $data['posts'] = $categories->posts()->get();
        return view('public.pages.support.information_support.userManualCat', $data);
    }

    public function procedureGuide()
    {

        SEO::setTitle(setting('meta_title_of_supportProcedureGuide') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn thủ tục');
        SEO::setDescription(setting('meta_description_of_supportProcedureGuide') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn thủ tục');
        SEOMeta::addKeyword(setting('meta_keyword_of_supportProcedureGuide') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn thủ tục');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        $polices = [];
        for ($i = 1; $i <= 11; $i++) {
            $func = 'getChinhSach' . $i;
            $polices['chinhsach' . $i] = Banner::$func();
        }
        $data['polices'] = $polices;
        $data['banggiachinhsach'] = Banner::getbangGiaChinhSach();

        $data['billingInformation'] = [];

        for ($i = 1; $i <= 4; $i++) {
            $func = 'getChinhSachThanhToan' . $i;
            $data['billingInformation'][] = Banner::$func();
        }
        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Hướng dẫn thủ tục';
        return view('public.pages.support.procedureGuide', $data);
    }

    public function privacyPolicy()
    {
        $data['privatePolicy'] = [];
        for ($i = 1; $i <= 2; $i++) {
            $func = 'getDieuKhoan' . $i;
            $data['privatePolicy'][] = Banner::$func();
        }

        SEO::setTitle(setting('meta_title_of_privacyPolicy') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Điều khoản bảo mật');
        SEO::setDescription(setting('meta_description_of_privacyPolicy') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Điều khoản bảo mật');
        SEOMeta::addKeyword(setting('meta_keyword_of_privacyPolicy') ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Điều khoản bảo mật');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Điều khoản bảo mật';
        return view('public.pages.support.privacyPolicy', $data);
    }

    public function faq($slug = null)
    {
        $data['slug'] = $slug;
        $data['groups'] = Group::findOrFail(275)->children()->get();
        if ($slug != null) {
            $group = Group::where('slug', $slug)->first();
            $posts = $group->posts();
            // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Câu hỏi thường gặp - '. $group->name .'';

            SEO::setTitle($group->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Câu hỏi thường gặp - ' . $group->name . '');
            SEO::setDescription($group->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Câu hỏi thường gặp - ' . $group->name . '');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($group->logo->path);
            OpenGraph::addImage($group->logo->path);
            SEOMeta::addKeyword($group->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ thông tin - Câu hỏi thường gặp - ' . $group->name . '');
            SEO::twitter()->setSite(route('home'));
        } else {
            $group = $data['groups'][0];
            $posts = $group->posts();
            // $data['title'] = 'Muốn lắp mạng FPT liên hệ ở đâu?';

            SEO::setTitle($group->meta->meta_title ?? 'Muốn lắp mạng FPT liên hệ ở đâu?');
            SEO::setDescription($group->meta->meta_description ?? 'Muốn lắp mạng FPT liên hệ ở đâu?');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($group->logo->path);
            OpenGraph::addImage($group->logo->path);
            SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Muốn lắp mạng FPT liên hệ ở đâu?');
            SEO::twitter()->setSite(route('home'));
        }
        $data['posts'] = $posts->when(request('s'), function ($query) {
            $s = request('s');
            return $query->whereHas('translations', function ($query2) use ($s) {
                return $query2->where('name', 'LIKE', "%$s%");
            });
        })->get();
        return view('public.pages.support.faq', $data);
    }

    public function installationInstructions($slug = null)
    {
        $data['slug'] = $slug;
        $data['groups'] = Group::findOrFail(284)->children()->get();
        if ($slug != null) {
            $data['group'] = Group::where('slug', $slug)->first();
            $data['posts'] = $data['group']->posts()->get();
            // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt - '. $data['group']->name .'';

            SEO::setTitle($data['group']->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt - ' . $data['group']->name . '');
            SEO::setDescription($data['group']->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt - ' . $data['group']->name . '');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($data['group']->logo->path);
            OpenGraph::addImage($data['group']->logo->path);
            SEOMeta::addKeyword($data['group']->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt - ' . $data['group']->name . '');
            SEO::twitter()->setSite(route('home'));
        } else {
            $data['group'] = $data['groups'][0];
            $data['posts'] = $data['groups'][0]->posts()->get();

            SEO::setTitle($data['group']->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt');
            SEO::setDescription($data['group']->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($data['group']->logo->path);
            OpenGraph::addImage($data['group']->logo->path);
            SEOMeta::addKeyword($data['group']->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt');
            SEO::twitter()->setSite(route('home'));

            // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Hướng dẫn cài đặt';
        }
        return view('public.pages.support.technical_assistance.installationInstructions', $data);
    }

    public function resovleProblem($slug = null)
    {
        $data['slug'] = $slug;
        $data['groups'] = Group::findOrFail(285)->children()->get();
        if ($slug != null) {
            $data['group'] = Group::where('slug', $slug)->first();
            $data['posts'] = $data['group']->posts()->get();

            SEO::setTitle($data['group']->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố - ' . $data['group']->name . '');
            SEO::setDescription($data['group']->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố - ' . $data['group']->name . '');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($data['group']->logo->path);
            OpenGraph::addImage($data['group']->logo->path);
            SEOMeta::addKeyword($data['group']->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố - ' . $data['group']->name . '');
            SEO::twitter()->setSite(route('home'));

            // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố - '. $data['group']->name .'';
        } else {
            $data['group'] = $data['groups'][0];
            $data['posts'] = $data['groups'][0]->posts()->get();

            SEO::setTitle($data['group']->meta->meta_title ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố');
            SEO::setDescription($data['group']->meta->meta_description ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố');
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($data['group']->logo->path);
            OpenGraph::addImage($data['group']->logo->path);
            SEOMeta::addKeyword($data['group']->meta->meta_keyword ?? 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố');
            SEO::twitter()->setSite(route('home'));

            // $data['title'] = 'FPT Telecom - Hỗ trợ - Hỗ trợ kĩ thuật - Xử lý sự cố';
        }
        return view('public.pages.support.technical_assistance.resovleProblem', $data);
    }

    public function storedContact(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'name'             => ['required', 'max:255'],
            'email'            => ['required', 'email', 'max:255'],
            'content'          => ['required', 'min:20', 'max:255'],
            'recaptcha_action' => ['required'],
            'recaptcha_token'  => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret'   => config('services.google_recaptcha.secret'),
                'response' => $inputs['recaptcha_token'],
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        if (
            !empty($result) && is_object($result)
            && $result->success
            && $result->action === $inputs['recaptcha_action']
        ) {
            if ($result->score >= 0.5) {
                // TODO: Store contact or send mail contact here
                return redirect()->route('contact')->with(['message' => __('Thank you, we have received your contact content')]);
            } else {
                $validator->getMessageBag()->add('recaptcha', __('Recaptcha verify failed with score is ' . $result->score));
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        $validator->getMessageBag()->add('recaptcha', __('Recaptcha verify failed'));
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function getProvinces()
    {
        return Province::all()->pluck('name', 'id');
    }

    public function postContact(Request $request)
    {
        $relus = [
            'name'      => ['required'],
            'phone'     => ['required', 'regex:/(0[3|5|7|8|9])+([0-9]{8})\b/u'],
            'email'     => ['required', "regex: /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/u"],
            'address'   => ['required']
        ];
        $message = [
            'name.required'     => 'Vui lòng nhập họ tên',
            'phone.required'    => 'Vui lòng nhập SĐT',
            'phone.regex'       => 'Vui lòng nhập đúng định dạng SĐT',
            'email.required'    => 'Vui lòng nhập Email',
            'email.regex'       => 'Vui lòng nhập đúng định dạng Email',
            'address.required'  => 'Vui lòng nhập địa chỉ',
        ];
        $validator = Validator::make($request->all(), $relus, $message);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // $data = request()->all();
        // unset($data['_token']);
        // $email_to = [
        //    'mailto@gmail.com'
        // ];

        // // Mail::to($email_to)->send(new SendMail($data,$provinces));
        return view('public.mail.thank_you');
    }

    public function index()
    {
        $data['title'] = "Trang Chủ - FPT Telecom - Công ty Cổ phần Viễn thông FPT";
        return view('public.pages.index');
    }

    public function recursiveCatId($childrenCat)
    {
        foreach ($childrenCat as $item) {
            $item['children'] = $this->recursiveCatId($item->childrenRecursive);
            array_push($this->keyCatSupport, $item->id);
            // $this->keyCatSupport[] = $item->id;
        }
        return $this->keyCatSupport;
    }

    public function news(Request $request)
    {
        SEO::setTitle(setting('meta_title_of_news') ?? 'Tin tức - Cập nhật các tin tức mới nhất FPT Telecom!');
        SEO::setDescription(setting('meta_description_of_news') ?? 'Tin tức - Cập nhật các tin tức mới nhất FPT Telecom!');
        SEOMeta::addKeyword(setting('meta_keyword_of_news') ?? 'Tin tức - Cập nhật các tin tức mới nhất FPT Telecom!');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');
        OpenGraph::addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');
        SEO::twitter()->setSite(route('home'));

        $categories = Group::with('childrenRecursive')->where('id', 268)->get();
        $data['listCatSupport'] = $this->recursiveCatId($categories);
        $data['title'] = "Tin tức - Cập nhật các tin tức mới nhất FPT Telecom!";
        $data['posts'] = Post::with('groups');
        // dd(Group::with('posts')->whereNotIn('id', $listCat)->get());
        if ($request->has('q')) {
            $keyword = $request->get('q');
            $data['posts'] = $data['posts']->whereHas('translations', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            });
        }
        $data['posts'] = $data['posts']->desc()->paginate($this->perPage);
        // dd($data['posts'][0]->groups->pluck('id'));
        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));
        return view('public.pages.news', $data);
    }

    public function newsEmagazine()
    {
        $group = Group::findOrFail(260);
        $posts = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? $group->name);
        SEO::setDescription($group->meta->meta_description ?? $group->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? $group->name);
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.news.news_emagazine', compact('posts'));
    }

    public function newsPress()
    {
        $group = Group::findOrFail(259);
        $posts = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? $group->name);
        SEO::setDescription($group->meta->meta_description ?? $group->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? $group->name);
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.news.news_press', compact('posts'));
    }

    public function newsFPT()
    {
        $group = Group::findOrFail(258);
        $posts = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? $group->name);
        SEO::setDescription($group->meta->meta_description ?? $group->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? $group->name);
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.news.news_fpt', compact('posts'));
    }

    public function registerOnl(Request $request)
    {
        $data['category_services_1'] = CategoryService::findOrFail(5)->services()->get();
        $data['category_services_2'] = CategoryService::findOrFail(6)->services()->get();

        $data['area_id'] = null;

        if ($request->has('locationId')) {
            $getAreaId = AreaProvince::where('province_id', $request->locationId)
                ->pluck('area_id')
                ->toArray();

            if ($getAreaId != null) {
                $data['area_id'] = $getAreaId;
                $final = [];
                foreach ($data['area_id'] as $key => $value) {
                    $area[] = AreaService::where([['area_id', $value], ['province_id', $request->locationId]])
                        ->get();
                }
                foreach ($area as $k => $v) {
                    foreach ($v as $v2) {
                        $final[] = $v2;
                    }
                }

                if ($final != null) {
                    $finalArea = collect($final)->sortBy('price_area_discount')->first();
                    $areaId = $finalArea->area_id;
                    $provinceId = $finalArea->province_id;

                    $data['category_services_1'] = Service::join('area_services', 'services.id', '=', 'area_services.service_id')
                        ->where([['area_id', $areaId], ['province_id', $provinceId], ['category_service_id', 5]])
                        ->get();

                    $data['category_services_2'] = Service::join('area_services', 'services.id', '=', 'area_services.service_id')
                        ->where([['area_id', $areaId], ['province_id', $provinceId], ['category_service_id', 6]])
                        ->get();

                    $data['service_internetFpt'] = $data['category_services_1']->merge($data['category_services_2']);

                    $data['service_comboInternet'] = Service::join('area_services', 'services.id', '=', 'area_services.service_id')
                        ->where([['area_id', $areaId], ['province_id', $provinceId], ['category_service_id', 7]])
                        ->get();;

                    $data['services_camfpt'] = CategoryService::findOrFail(21)->services()->get();
                    $data['services_cloud'] = CategoryService::findOrFail(22)->services()->get();

                    $data['services_fptplaybox'] = CategoryService::findOrFail(12)->services()->get();

                    $data['services_ihome'] = CategoryService::findOrFail(15)->services()->first();

                    $data['provinces'] = Province::all()->pluck('name', 'id');

                    return view('public.pages.online_register', $data);
                } else {
                    $data['service_internetFpt'] = $data['category_services_1']->merge($data['category_services_2']);

                    $data['service_comboInternet'] = CategoryService::findOrFail(7)->services()->get();
                    if (request()->get('locationId')) {
                        $data['area_id'] = AreaProvince::where('province_id', request()->get('locationId'))
                            ->pluck('area_id')
                            ->toArray();
                    }

                    $data['services_camfpt'] = CategoryService::findOrFail(21)->services()->get();
                    $data['services_cloud'] = CategoryService::findOrFail(22)->services()->get();

                    $data['services_fptplaybox'] = CategoryService::findOrFail(12)->services()->get();

                    $data['services_ihome'] = CategoryService::findOrFail(15)->services()->first();

                    $data['provinces'] = Province::all()->pluck('name', 'id');

                    return view('public.pages.online_register', $data);
                }
            }
        }
        $data['service_internetFpt'] = $data['category_services_1']->merge($data['category_services_2']);


        $data['service_comboInternet'] = CategoryService::findOrFail(7)->services()->get();

        $data['services_camfpt'] = CategoryService::findOrFail(21)->services()->get();
        $data['services_cloud'] = CategoryService::findOrFail(22)->services()->get();

        $data['services_fptplaybox'] = CategoryService::findOrFail(12)->services()->get();

        $data['services_ihome'] = CategoryService::findOrFail(15)->services()->first();

        $data['provinces'] = Province::all()->pluck('name', 'id');

        $data['title'] = 'Đăng ký Online - Cập nhật các gói cước mới nhất FPT Telecom!';
        return view('public.pages.online_register', $data);
    }

    public function sale()
    {
        // $data['title'] = 'Khuyến mãi - FPT Telecom';
        $group = Group::findOrFail(15);
        SEO::setTitle($group->meta->meta_title ?? $group->name);
        SEO::setDescription($group->meta->meta_description ?? $group->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? $group->name);
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));
        $data['provinces'] =Province::all()->pluck('name', 'id');
        $saleGroups =  Group::where('slug', 'khuyen-mai')->first();
        if(is_null($saleGroups)) {
            return redirect()->route('home');
        }
        $data['saleGroups'] = $saleGroups->children()->orderBy('position', 'asc')->get();
        $data['post_sale'] = $saleGroups->posts()->desc()->paginate($this->perPage);
        return view('public.pages.sale', $data);
    }

    public function salePageCustom($slug)
    {
        $data = [];
        if (is_null($slug)) {
            return redirect()->to('pages.sale');
        }
        $saleGroups = Group::where('slug', 'khuyen-mai')->first()->children()->orderBy('position', 'asc')->get();
        $group = Group::where('slug', 'LIKE' ,'%'.$slug.'%')->first();
        if(is_null($group)) {
            return redirect()->route('home');
        }
        $data['saleGroups'] =  $saleGroups;
        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));
        $data['provinces'] = Province::all()->pluck('name', 'id');
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);
        $data['group'] = $group;
         SEO::setTitle($group->meta->meta_title ?? $group->name);
        SEO::setDescription($group->meta->meta_description ?? $group->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? $group->name);
        SEO::twitter()->setSite(route('home'));
        return view('public.pages_custom.sale.general', $data);
    }

    public function salePageCustomArea($slug, $area)
    {
        if (is_null($area)) {
            return redirect()->route('home');
        }
        // $salePage = CustomPage::with('group')->where('slug', 'khuyen-mai')->first();
        $saleGroup = Group::where('slug', 'khuyen-mai')->first();
        if(is_null($saleGroup)) {
            return redirect()->route('home');
        }
        $group = $saleGroup->children()->where('slug', $slug)->first();
        if($group == null) {
            return redirect()->route('home');
        }
        $groupArea = $group->children()->where('slug', 'LIKE' , '%'.$area.'%')->first();
        $saleGroups = $saleGroup->children()->orderBy('position', 'asc')->get();
        if (!is_null($groupArea)) {
            SEO::setTitle($groupArea->meta->meta_title ?? $groupArea->name);
            SEO::setDescription($groupArea->meta->meta_description ?? $groupArea->name);
            SEO::opengraph()->setUrl(url()->current());
            SEO::jsonLd()->addImage($groupArea->logo->path);
            OpenGraph::addImage($groupArea->logo->path);
            SEOMeta::addKeyword($groupArea->meta->meta_keyword ?? $groupArea->name);
            SEO::twitter()->setSite(route('home'));
            $postGroupArea = $groupArea->posts()->desc()->first();
            if(is_null($postGroupArea)) {
                return redirect()->route('home');
            }
            return view('public.pages_custom.sale.sale_area', [
                'postGroupArea' => $postGroupArea,
                'groupArea' => $groupArea,
                'saleGroups' => $saleGroups,
                'area' => $area,
                'slider' => Slider::findWithSlides(setting('fpt_slider')),
                'provinces' => Province::all()->pluck('name', 'id'),
            ]);
        }
        return redirect()->route('home');
    }


    // public function saleCategories($slug)
    // {
    //     $categories = Group::where('slug', $slug)->firstOrFail();

    //     $data['title'] = 'Khuyến mãi '. $categories->name .' - FPT Telecom';

    //     $data['posts'] = $categories->posts()->paginate($this->perPage);

    //     return view('public.pages.news.categories', $data);

    // }


    public function paginateCustom($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }

    public function saleInternet()
    {
        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));

        $group = Group::findOrFail(262);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mãi lắp đặt Internet FPT');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mãi lắp đặt Internet FPT');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mãi lắp đặt Internet FPT');
        SEO::twitter()->setSite(route('home'));


        return view('public.pages.news.sale_internet', $data);
    }

    public function saleNetTv()
    {


        $group = Group::findOrFail(263);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mãi lắp đặt Truyền hình FPT -  FPT Telecom');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mãi lắp đặt Truyền hình FPT -  FPT Telecom');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mãi lắp đặt Truyền hình FPT -  FPT Telecom');
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));


        return view('public.pages.news.sale_netTv', $data);
    }

    public function comboInternet()
    {


        $group = Group::findOrFail(264);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mại lắp đặt Combo Internet và truyn hình FPT 2 trong 1 cực sốc');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mại lắp đặt Combo Internet và truyn hình FPT 2 trong 1 cực sốc');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mại lắp đặt Combo Internet và truyn hình FPT 2 trong 1 cực sốc');
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));
        return view('public.pages.news.sale_combo', $data);
    }

    public function cameraFpt()
    {

        $group = Group::findOrFail(265);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mại lắp đặt Camera');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mại lắp đặt Camera');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mại lắp đặt Camera');
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));

        return view('public.pages.news.sale_camera', $data);
    }

    public function playBoxx()
    {

        $group = Group::findOrFail(266);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mại lắp đặt FPT Play Box');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mại lắp đặt FPT Play Box');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mại lắp đặt FPT Play Box');
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));

        return view('public.pages.news.sale_playbox', $data);
    }

    public function iHome()
    {

        $group = Group::findOrFail(267);
        $data['posts'] = $group->posts()->desc()->paginate($this->perPage);

        SEO::setTitle($group->meta->meta_title ?? 'Khuyến mại lắp đặt FPT iHome');
        SEO::setDescription($group->meta->meta_description ?? 'Khuyến mại lắp đặt FPT iHome');
        SEO::opengraph()->setUrl(url()->current());
        SEO::jsonLd()->addImage($group->logo->path);
        OpenGraph::addImage($group->logo->path);
        SEOMeta::addKeyword($group->meta->meta_keyword ?? 'Khuyến mại lắp đặt FPT iHome');
        SEO::twitter()->setSite(route('home'));

        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));

        return view('public.pages.news.sale_ihome', $data);
    }

    public function individualFiber()
    {
        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeature' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        // $data['title'] = "[Cập nhật] Các gói cáp quang FPT mới nhất 2021";
        $data['category_services'] = CategoryService::with('services')->findOrFail(5);
        $data['features'] = $features;
        $data['provinces'] = Province::all()->pluck('name', 'id');
        $data['area_id'] = null;

        if (request()->get('locationId')) {
            $data['area_id'] = AreaProvince::where('province_id', request()->get('locationId'))
                ->pluck('area_id')
                ->toArray();
        }

        // dd($data['area_id']);
        // SEO
        SEO::setTitle($data['category_services']->meta->meta_title);
        SEO::setDescription($data['category_services']->meta->meta_description);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword);
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.individual_fiber_optic_cable', $data);
    }

    // public function individualFiber1()
    // {
    //     $data['title'] = "[Cập nhật] các gói mạng FPT mới nhất 2021";
    //     return view('public.pages.product_and_service.individual_fiber_optic_cable', $data);
    // }

    public function enterpriseFiber()
    {
        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeatureEenterprise' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        $data['category_services'] = CategoryService::with('services')->findOrFail(6);
        $data['features'] = $features;
        // $data['title'] = "[Cập nht] các gói cáp quang FPT cho doanh nghiệp mới nhất 2021";
        $data['provinces'] = Province::all()->pluck('name', 'id');

        $data['area_id'] = null;

        if (request()->get('locationId')) {
            $data['area_id'] = AreaProvince::where('province_id', request()->get('locationId'))
                ->pluck('area_id')
                ->toArray();
        }
        // SEO
        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nht] các gói cáp quang FPT cho doanh nghiệp mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nht] các gói cáp quang FPT cho doanh nghiệp mới nhất 2021');
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nht] các gói cáp quang FPT cho doanh nghiệp mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.enterprise_fiber_optic_cable', $data);
    }

    public function netTv()
    {

        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeatureNetFpt' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        $data['category_services'] = CategoryService::with('services')->findOrFail(7);
        $data['features'] = $features;
        // $data['title'] = "[Cập nhật] các gói COMBO Internet & Truyền hình FPT mới nhất 2021";
        $data['provinces'] = Province::all()->pluck('name', 'id');
        $data['area_id'] = null;

        if (request()->get('locationId')) {
            $data['area_id'] = AreaProvince::where('province_id', request()->get('locationId'))
                ->pluck('area_id')
                ->toArray();
        }
        // SEO
        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nhật] các gói COMBO Internet & Truyền hình FPT mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nhật] các gói COMBO Internet & Truyền hình FPT mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nhật] các gói COMBO Internet & Truyền hình FPT mới nhất 2021');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.net_tv', $data);
    }

    public function maxy()
    {

        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeatureGoiMaxy' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        $data['banner_chinhsachbanhang'] = Banner::getBannerChinhSachBanHangMaxy();
        $data['category_services'] = CategoryService::with('services')->find(9);
        $data['features'] = $features;

        // $data['title'] = "[Cập nhật] các gói Truyền hnh FPT mới nhất 2021";

        // SEO
        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nhật] các gói Truyền hnh FPT mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nhật] các gói Truyền hnh FPT mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nhật] các gói Truyền hnh FPT mới nhất 2021');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.maxy', $data);
    }

    public function playBox()
    {
        // $data['menus'] = Menu::with('menuItems')->findOrFail(setting('fpt_menu_internet_fpt'));
        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeatureFptPlayBox' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        $data['table_desc'] = Banner::getTableContentFptPlayBox();
        $data['gia_thiet_bi'] = Banner::getBannerGiaThietBi();
        $data['category_services'] = CategoryService::with('services')->findOrFail(12);
        $data['features'] = $features;

        // $data['title'] = "[Cập nhật] các gói FPT Play Box mới nhất 2021";

        // SEO
        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nhật] các gói FPT Play Box mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nhật] các gói FPT Play Box mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nhật] các gói FPT Play Box mới nhất 2021');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.play_box', $data);
    }

    public function play()
    {
        $features = [];
        for ($i = 1; $i <= 10; $i++) {
            $func = 'getBannerFeatureFptPlay' . $i;
            $features['banner' . $i] = Banner::$func();
        }
        $data['table_desc'] = Banner::getTableContentFptPlayTienDichVu();
        $data['category_services'] = CategoryService::with('services')->findOrFail(16);
        $data['features'] = $features;
        $data['fptPlayServices'] = CategoryService::with('services')->find(24);

        // $data['title'] = "FPT Play";

        // // SEO
        SEO::setTitle($data['category_services']->meta->meta_title ?? 'FPT Play');
        SEO::setDescription($data['category_services']->meta->meta_description ?? 'FPT Play');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? 'FPT Play');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.fpt_play', $data);
    }

    public function fptCamera()
    {
        $data['category_services_camfpt'] = CategoryService::with('services', 'parent')->findOrFail(21);
        $data['category_services_cloud'] = CategoryService::with('services', 'parent')->findOrFail(22);

        $data['category_services'] = CategoryService::findOrFail(14);

        // dd($data['category_services_camfpt']->parent->banner);
        // $data['title'] = "[Cập nhật] các gói FPT Camera mới nhất 2021";

        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nhật] các gói FPT Camera mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nhật] các gói FPT Camera mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nhật] các gói FPT Camera mới nhất 2021');
        SEO::twitter()->setSite(route('home'));

        return view('public.pages.product_and_service.fpt_camera', $data);
    }

    public function fptIhome()
    {
        $data['category_services'] = CategoryService::with('services')->findOrFail(15);

        SEO::setTitle($data['category_services']->meta->meta_title ?? '[Cập nhật] các gói FPT iHome mới nhất 2021');
        SEO::setDescription($data['category_services']->meta->meta_description ?? '[Cập nhật] các gói FPT iHome mới nhất 2021');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($data['category_services']->logo->path);
        OpenGraph::addImage($data['category_services']->logo->path);
        SEOMeta::addKeyword($data['category_services']->meta->meta_keyword ?? '[Cập nhật] các gói FPT iHome mới nhất 2021');
        SEO::twitter()->setSite(route('home'));

        // $data['title'] = "[Cập nhật] các gói FPT iHome mới nhất 2021";
        return view('public.pages.product_and_service.fpt_home', $data);
    }

    public function userManual()
    {
        $data['title'] = "Hướng dẫn sử dụng";
        return view('public.pages.support.user_manual', $data);
    }

    // public function internetFpt()
    // {
    //     $data['title'] = "[Cập nhật] gói cước Internet FPT mới nhất 2021 - FPT Telecom";
    //     return view('public.pages.product_and_service.internet_fpt', $data);
    // }

    // public function maxyTv()
    // {
    //     $data['title'] = "Cập nhật các gói Truyền hình FPT mới nhất 2021";
    //     return view('public.pages.product_and_service.maxy_tv', $data);
    // }

    public function onlineService()
    {

        SEO::setTitle(setting('meta_title_of_onlineService') ?? 'Dịch vụ online');
        SEO::setDescription(setting('meta_description_of_onlineService') ?? 'Dịch vụ online');
        SEOMeta::addKeyword(setting('meta_keyword_of_onlineService') ?? 'Dịch vụ online');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        // $data['title'] = "Dịch vụ online";
        return view('public.pages.product_and_service.online_service', $data);
    }

    public function smartHome()
    {
        $data['title'] = "Smart Home";
        return view('public.pages.product_and_service.smart_home', $data);
    }

    public function lapmangfpthanoi()
    {
        $data['title'] = "Lap mang fpt ha noi";
        return view('public.pages.promotion.lapmangfpthanoi', $data);
    }

    public function register()
    {
        SEO::setTitle(setting('meta_title_of_registerInformation') ?? 'Đăng ký thông tin lắp đặt');
        SEO::setDescription(setting('meta_description_of_registerInformation') ?? 'Đăng ký thông tin lắp đặt');
        SEOMeta::addKeyword(setting('meta_keyword_of_registerInformation') ?? 'Đăng ký thông tin lắp đặt');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('https://ftel.vn/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        $districts = District::all();
        $provinces = Province::all();
        return view('public.mail.form_register', compact('districts', 'provinces'));
    }

    public function getJson($id)
    {
        $provinces = Province::find($id)->districts()->pluck('name', 'id');
        return response()->json($provinces);
    }
    public function sendMail(RegisterRequest $request)
    {


        $provinces = Province::find($request->get('provinces'));
        $provinces = $provinces->name;
        $idDistrict = request()->get('district');
        if ($district = District::find($idDistrict)) {
            $district  = $district->name;
        } else {
            $district = "";
        }


        $address = "{$request->get('housenumber')}, {$district}, {$provinces}";

        $name = $request->get('fullname');
        $phone = $request->get('phonenumber');
        $service = $request->get('ward');
        $housetype = $request->get('housetype') ?? '---';
        $email = $request->get('email') ?? '---';
        $message = $request->get('note') ?? '---';
        $currentDate = date('d/m/Y H:i:s');

        // $this->google_sheet_adz->saveDataToSheet([
        //     [$name, $email, $phone, $provinces, $district, $address, $housetype, $service, $message, $currentDate]
        // ]);
        
         $this->google_sheet_adsen->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service ,$message]
        ]);


        // $data = request()->all();
        // unset($data['_token']);
        // $id = request()->provinces;
        // $provinces = Province::find($id);
        // $provinces = $provinces["name"];
        // $idDistrict = request()->district;
        // if ($district = District::find($idDistrict)) {
        //     $district  = $district['name'];
        // } else {
        //     $district = "";
        // }
        // $email_to = [
        //     'info@webmaster.com.vn',
        //     'hanhpt7@fpt.com.vn',
        //     '',
        // ];

        // Mail::to($email_to)->send(new SendMail($data,$provinces,$district));
        return redirect()->route('pages.thankyou');
    }

    public function thankyou()
    {
        return view('public.mail.thank_you');
    }

    public function subLinkLevel2($slug1, $slug2)
    {
        $lib = $this->lib();
        $newslug = '/' . $slug1 . '/' . $slug2 . '/';
        if (isset($lib[$newslug])) {
            return redirect($lib[$newslug], 301);
        } else {
            // return redirect('https://ftel.vn/', 301 );
        }

        return view('public.pages.register', $data);
    }

    public function subLinkLevel3($slug1, $slug2, $slug3)
    {
        $lib = $this->lib();
        $newslug = '/' . $slug1 . '/' . $slug2 . '/';
        if (isset($lib[$newslug])) {
            return redirect($lib[$newslug], 301);
        } else {
            // return redirect('https://ftel.vn/', 301 );
        }

        return view('public.pages.register', $data);
    }



    public function lib()
    {
        return [

            '/event-tuyen-dung-cuoi-cung-cua-fpt-telecom-trong-nam-2014/' =>    '/',
            '/khuyen-mai-lap-dat-internet-fpt/' =>  '/san-pham-dich-vu/internet-fpt',
            '/giao-su-xoay-xuong-nui-lam-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/mo-ket-chuong-trinh-tuong-tac-cua-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-nang-cap-hang-loat-kenh-quoc-te-tu-sd-len-hd-gia-khong-doi/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/cuoc-thi-trang-tri-bao-tuong-ftel-20-nam/' => '/tin-tuc/tin-fpt',
            '/15-nam-fyt-qua-nhung-dau-son/' => '/tin-tuc/tin-fpt',
            '/ai-se-thang-manchester-chelsea-ke-tam-lang-nguoi-nua-can/' => '/tin-tuc/tin-emagazine',
            '/bai-tho-tieng-bien-cua-nguoi-linh-dao-lay-dong-trieu-trai-tim/' =>    '/tin-tuc/tin-emagazine',
            '/ban-can-ho-65-1-m2-tang-09-toa-ct12b-tai-chung-cu-kim-van-kim-lu/' => '/tin-tuc/tin-emagazine',
            '/ban-da-tham-gia-mo-ket-tren-truyen-hinh-fpt-chua/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/ban-tin-3-ky-thi-chinh-thuc-bat-dau-trang-fpt-2014/' =>   '/tin-tuc/tin-fpt',
            '/ban-yeu-quy-khong-biet-ban-lua-chon-kieu-song-nao-day/' =>    '/tin-tuc/tin-bao-chi',
            '/bao-gia-adsl/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/bao-gia-cap-quang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/bao-gia-cap-quang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/bao-gia-cap-quang-fpt-tai-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/bao-gia-cap-quang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/combo-fpt-da-nang/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/bao-gia-goi-cloud-camera-fpt/' => '/san-pham-dich-vu/smart-home/fpt-camera',
            '/bao-gia-hosting-fpt/' =>  '/san-pham-dich-vu',
            '/bao-gia-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/bung-no-khuyen-mai-combo-internettruyen-hinh-fpt-thang-3/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/bung-no-khuyen-mai-lap-mang-fpt-thang-102016/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/cac-goi-cuoc-internet-adsl/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cac-goi-dich-vu-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/cac-hinh-thuc-thanh-toan-cuoc-dich-vu-internet-truyen-hinh-cua-fpt-telecom/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/cac-tinh-nang-noi-bat-tren-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/cach-gia-han-goi-fpt-play/' =>    '/san-pham-dich-vu/dich-vu-online/fpt-play',
            '/cai-dat-camera-tren-fpt-play-box/' => '/san-pham-dich-vu/smart-home/fpt-camera',
            '/camera-fpt-ip-luu-tru-cloud/' =>  '/san-pham-dich-vu/smart-home/fpt-camera',
            '/can-ban-gap-can-ho-118-32m2-tai-golden-palace-tri-gia-re-nhan-nha-ngay/' =>   '/tin-tuc/tin-emagazine',
            '/fpt-telecom-canh-bao-2-website-gia-mao/' =>   '/tin-tuc',
            '/cap-quang-aag-lai-dut-vao-sang-23-4-2015/' => '/tin-tuc',
            '/cap-quang-bien-aag-duoc-han-noi-nhu-nao/' =>  '/tin-tuc',
            '/cap-quang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-danh-cho-kh-chuyen-tu-nha-mang-khac-sang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-da-nang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-gia-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-gia-re-danh-cho-sinh-vien-va-gia-dinh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-goi-fiber-play-goi-cuoc-khuyen-mai-danh-cho-doi-thu/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-ha-noi-chao-mung-ngay-nha-giao-viet-nam-20-11/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-hcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fiber-public-goi-cuoc-game-internet-danh-cho-doi-thu-canh-tranh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-fpt-sieu-toc-con-loc-khuyen-mai/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/cap-quang-sieu-toc-fpt-dang-cap-the-hien-bang-chat-luong/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/cau-hoi-danh-gia-cua-nguoi-tieu-dung-ve-truyen-hinh-fpt-vtvcab-k/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/giam-gia-lap-mang-fpt-da-nang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/chay-dua-binh-dan-hoa-internet-tv/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/chay-so-truyen-hinh-fpt-rinh-tv-led/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/chinh-chu-can-ban-can-ho-c-11-08-tai-golden-palace-tri/' =>   '/tin-tuc/tin-emagazine',
            '/chinh-sach-bao-hanh-fpt-ihome/' =>    '/san-pham-dich-vu/smart-home/fpt-ihome',
            '/chuc-mung-ngay-quoc-te-phu-nu-8-3-toi-chi-em-fpt/' => '/tin-tuc/tin-fpt',
            '/chung-ket-cuoc-thi-giai-toan-qua-internet-dinh-nui-tri-tue/' =>   '/tin-tuc/tin-fpt',
            '/chuong-trinh-chao-mung-ngay-thanh-lap-tp/' => '/tin-tuc/tin-fpt',
            '/chuong-trinh-khuyen-mai-lap-mang-fpt-phuong-cua-nam-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/combo-internet-va-truyen-hinh-fpt-bung-no-trong-thang-5-2016/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/combo-internet-va-truyen-hinh-fpt-sieu-tiet-kiem/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/combo-internet-va-truyen-hinh-fpt-khuyen-mai-thang-112016/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/cong-ty-fpt-telecom-20-nam-mot-chang-duong/' =>   '/tin-tuc/tin-fpt',
            '/danh-sach-cac-kenh-truyen-hinh-goi-vtv-cab-hd/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/danh-sach-kenh-goi-co-ban-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/danh-sach-kenh-goi-mo-rong-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-play-hd-goi-premium-hd/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/danh-sach-kenh-truyen-hinh-fpt-goi-vod-hd/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/fiber-family-fpt/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dich-vu-theo-yeu-cau-tren-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dich-vu-truyen-hinh-fpt-fpt-telecom/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/du-lich-quanh-the-gioi-voi-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dai-tiec-khuyen-mai-mung-sinh-nhat-fpt/' =>   '/tin-tuc/tin-fpt',
            '/dai-tiec-khuyen-mai-truyen-hinh-fpt-mung-sinh-nhat-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ki-cap-quang-fpt-gia-nong-bong-tay/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ki-cap-quang-fpt-da-nang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ki-cap-quang-fpt-tai-da-nang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ki-internet-fpt-tphcm/' =>   '/san-pham-dich-vu/internet-fpt',
            '/dang-ki-lap-cap-quang-fpt-tp-hcm/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ki-lap-mang-fpt-da-nang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-cho-doanh-nghiep-thang-7-2015/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/dang-ky-cap-quang-fpt-cho-doanh-nghiep-thang-9/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/dang-ky-cap-quang-fpt-cho-quan-game-va-doanh-nghiep-thang-8-2015/' => '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/dang-ky-cap-quang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-ha-noi-gia-re-thang-7-2015/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-hcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-hcm-gia-re-thang-7-2015/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-pho-an-xa-ba-dinh-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-quan-ba-dinh/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-quan-cau-giay/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-quan-hoang-mai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-quan-nam-tu-liem/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-quan-tay-ho/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-tai-cac-toa-nha-du-an-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-thang-4-chi-voi-270k-thang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-tphcm/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-cap-quang-fpt-va-truyen-hinh-fpt-quan-cau-giay/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-chu-ky-so-fpt-ca/' => '/san-pham-dich-vu',
            '/dang-ky-dich-vu/' =>  '/san-pham-dich-vu',
            '/dang-ky-dich-vu-truyen-hinh-fpt-ha-noi-tphcm-co-hoi-nhan-ve-tham-du-liveshow-tam/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-internet-cap-quang-fpt-quan-ba-dinh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-internet-cap-quang-fpt-quan-cau-giay/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-internet-cap-quang-fpt-quan-hai-ba-trung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-internet-cap-quang-fpt-quan-hoan-kiem/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-internet-fpt/' => '/san-pham-dich-vu/internet-fpt',
            '/dang-ky-internet-fpt-gia-re-tai-tphcm/' =>    '/san-pham-dich-vu/internet-fpt',
            '/dang-ky-internet-fpt-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/dang-ky-lap-dat-mang-fpt/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/dang-ky-lap-mang-cap-quang-fpt-gia-re-chi-voi-270-000d/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-cap-quang-fpt-gia-re-thang-8-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-ho-chi-minh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-mien-phi-100/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-phuong-khuong-thuong-quan-dong-da/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-phuong-quang-an-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-phuong-quynh-mai-quan-hai-ba-trung/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-phuong-tan-mai-quan-hoang-mai-mien-phi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dang-ky-lap-mang-fpt-tai-ha-noi-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mang-fpt-hai-phong/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/dang-ky-mang-fpt-tp-hcm/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/dang-ky-mien-phi-lap-dat-mang-internet-fpt/' =>   '/san-pham-dich-vu/internet-fpt',
            '/dang-ky-truc-tuyen/' =>   '/san-pham-dich-vu',
            '/dang-ky-truyen-hinh-fpt-rinh-ngay-tivi-led/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-truyen-hinh-fpt-rinh-xe-sh-5-iphone-6-khuyen-mai-thang-12/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-truyen-hinh-fpt-thang-10-xem-mien-phi-k-hd/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-truyen-hinh-fpt-tphcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/dang-ky-wifi-fpt-mien-phi/' =>    '/san-pham-dich-vu/internet-fpt',
            '/fiber-business-35mbps/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fiber-home/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fiber-public-50mbps/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/fpt-bo-nhiem-hai-ptgd-phu-trach-toan-cau-hoa/' => '/tin-tuc/tin-fpt',
            '/fpt-building/' => '/san-pham-dich-vu/internet-fpt',
            '/fpt-telecom-cac-chi-nhanh/' =>    '/san-pham-dich-vu/smart-home/fpt-camera',
            '/fpt-camera/' =>   '/san-pham-dich-vu/smart-home/fpt-camera',
            '/fpt-cap-quang-uu-dai-danh-rieng-cho-khu-vuc-tp-hcm/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-cap-quang-tp-hcm-nhanh-nhat/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-da-nang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-ha-noi-cap-quang-toc-do-cao/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-ihome/' =>    '/san-pham-dich-vu/smart-home/fpt-ihome',
            '/fpt-internet-tp-hcm-sieu-tiet-kiem/' =>   '/san-pham-dich-vu/smart-home/fpt-ihome',
            '/fpt-play/' => '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/fpt-play-box-2018-qua-chat-ring-ngay-tang-thay-co/' =>    '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/fpt-play-box-2018-box-4k-bien-tivi-thuong-thanh-smart-tivi/' =>   '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/fpt-play-box-2018-xem-khong-gioi-han/' => '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/fpt-play-box-tai-ha-noi/' =>  '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/fpt-play-hd-tien-ich-hon-voi-truyen-hinh-xem-lai-tstv/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/fpt-skybeds/' =>  '/san-pham-dich-vu',
            '/fpt-software-ra-mat-phien-ban-thuong-mai-cua-citus-cloud-load-test/' =>   '/tin-tuc/tin-fpt',
            '/fpt-tan-thuan-trang-hoang-giang-sinh-som/' => '/tin-tuc/tin-fpt',
            '/tuyen-dung-nhan-vien-kinh-doanh-tai-ha-noi/' =>   '/',
            '/fpt-telecom-chinh-thuc-lam-viec-7-ngay-tuan-tu-ngay-01-06-2015/' =>   '/tin-tuc/tin-fpt',
            '/fpt-telecom-chot-ket-qua-binh-chon-lanh-dao-cua-nam/' =>  '/tin-tuc/tin-fpt',
            '/fpt-telecom-giam-gia-soc-dong-hanh-cung-ngoai-hang-anh-uu-dai-k/' =>  '/tin-tuc/tin-fpt',
            '/fpt-telecom-khuyen-mai-cuc-soc-chao-he-cung-52-do-c/' =>  '/tin-tuc/tin-fpt',
            '/fpt-telecom-khuyen-mai-dac-biet-thang-giang-sinh/' => '/tin-tuc/tin-fpt',
            '/fpt-telecom-nang-cap-bang-thong-duong-truyen-internet-voi-gia-khong-doi/' =>  '/tin-tuc/tin-fpt',
            '/fpt-telecom-tri-khach-hang-quy-3/' => '/tin-tuc/tin-fpt',
            '/fpt-telecom-tuyen-dung-cong-tac-vien-khoi-kinh-doanh-toan-quoc/' =>   '/',
            '/fpt-telecom-xep-thu-2-thi-phan-internet-bang-rong/' =>    '/tin-tuc/tin-fpt',
            '/fpt-tp-hcm-tuyen-dung-nhan-vien-kinh-doanh-fpt/' =>   '/',
            '/gioi-thieu-ve-fpttelecom/' => '/',
            '/free-100-lap-mang-fpt-phuong-bui-thi-xuan-quan-hai-ba-trung/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/free-100-lap-mang-fpt-phuong-phu-thuong-quan-tay-ho/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/free-lap-mang-fpt-phuong-hang-bai-quan-hai-ba-trung/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/ftv-lucas-onca-su-tro-lai-loi-hai-hon-gap-boi/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/fpt-play-box/' => '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/giai-dap-thac-mac-khi-lap-mang-fpt-1/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/giai-dap-thac-mac-truyen-hinh-fpt-1/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/giam-gia-cuoc-khi-lap-mang-fpt-phuong-giap-bat-quan-hoang-mai/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/giam-gia-cuoc-lap-mang-fpt-quan-bac-tu-liem-thang-102016/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/giam-gia-lap-mang-fpt-phuong-giap-bat-quan-hai-ba-trung/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/giam-gia-lap-mang-fpt-phuong-pham-ngu-lao-quan-hai-ba-trung/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/gioi-thieu-fpt-ihome/' => '/san-pham-dich-vu/smart-home/fpt-ihome',
            '/gioi-thieu-goi-mo-rong-danet-cua-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/gioi-thieu-goi-mo-rong-k-hd-cua-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/gioi-thieu-ve-dich-vu-truyen-hinh-fpt-play-hd/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/gioi-thieu-ve-fpt-camera/' => '/san-pham-dich-vu/smart-home/fpt-camera',
            '/gioi-thieu-ve-fpt-play-box/' =>   '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/goi-cuoc-fpt-tphcm/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/goi-cuoc-internet-truyen-hinh-fpt-tphcm/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/goi-cuoc-mang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/goi-cuoc-wifi-fpt-hcm/' =>    '/san-pham-dich-vu/internet-fpt',
            '/fiber-me/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/goi-dich-vu-mega-me/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/goi-dich-vu-mega-save/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/goi-dich-vu-mega-you/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fiber-play-50mbps/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/het-f-a-nho-internet/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/hifpt/' =>    '/tin-tuc/tin-fpt',
            '/ho-tro-khach-hang-mat-mang-internet-fpt/' =>  '/san-pham-dich-vu/internet-fpt',
            '/ho-tro-ve-fpt-play-box/' =>   '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/hoa-mang-internet-cap-quang-fpt-chi-voi-0d/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/ha-goi-kenh-vtvcab-tren-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/hon-23-000-nguoi-nha-f-con-doc/' =>   '/tin-tuc/tin-fpt',
            '/hop-dong-dang-ki-dich-vu-mang-cap-quang-va-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/huong-dan-cai-dat-va-thay-doi-user-va-pass-modem-wifi-cig-g-97d2-g-97rg3/' => '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/huong-dan-cai-dat-wifi-modem-cig-g-93rg1/' => '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/huong-dan-cau-hinh-modem-wifi/' =>    '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/huong-dan-chuyen-goi-dich-vu-mang-fpt/' =>    '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/huong-dan-doi-mat-khau-wifi-fpt-modem-gpon/' =>   '/san-pham-dich-vu/internet-fpt',
            '/huong-dan-chuyen-dia-diem-mang-fpt/' =>   '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/dieu-khien-fpt-play-box/' =>  '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/powerline-plc/' =>    '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/huong-dan-su-dung-tinh-nang-karativi-cua-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/huong-dan-truy-cap-quoc-te-nhanh-hon-khi-cap-quang-aag-bi-dut/' =>    '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/internet-fpt-co-tinh-nang-f-safe/' => '/san-pham-dich-vu/internet-fpt',
            '/internet-fpt-tp-hcm-toc-cao-gia-sieu-re/' =>  '/san-pham-dich-vu/internet-fpt',
            '/internet-fpt-vui-giang-sinh-rinh-khuyen-mai/' =>  '/san-pham-dich-vu/internet-fpt',
            '/internet-va-truyen-hinh-fpt-dong-hanh-cung-euro-2016/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/ket-qua-mo-ket-tren-truyen-hinh-fpt-tuan-thu-5/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khi-mot-ai/' =>   '/tin-tuc/tin-emagazine',
            '/kho-ung-dung-apstore/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-camera-fpt/' =>    '/san-pham-dich-vu/smart-home/fpt-camera',
            '/khuyen-mai-chao-cuc-soc-cua-fpt-telecom/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-combo-internet-truyen-hinh-fpt-thang-72016/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/khuyen-mai-combo-internet-truyen-hinh-fpt-thang-92016/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/khuyen-mai-cuc-chat-tu-tin-nhanh-nhat/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-cuc-chat-cap-quang-fpt-thang-52016/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-cuc-soc-lap-mang-fpt-tang-modem-4-port/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-cuc-soc-lap-mang-fpt-phuong-thuy-khue-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-cuc-soc-thang-7-cung-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-dac-biet-goi-combo-internet-va-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/khuyen-mai-lap-mang-cap-quang-fpt-2014/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-dac-biet-lap-mang-fpt-thang-8/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-fpt-play-box/' =>  '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/khuyen-mai-fpt-tp-hcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-gia-cuoc-lap-dat-internet-fpt-cho-sinh-vien-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-goi-combo-internet-va-truyen-hinh-fpt-thay-loi-tri-an-20-11/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/khuyen-mai-goi-combo-internet-va-truyen-hinh-fpt-cuc-soc-chao-xuan-2016/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/khuyen-mai-hot-lap-mang-fpt-thang-11/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-internet-dien-bien-hoa-mang-xuyen-bien-gioi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-internet-fpt-quan-hoang-mai-thang-6-2016/' =>  '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-khung-lap-mang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-cap-quang-fpt-sieu-re-thang-12/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-dat-cap-quang-fpt-tai-ha-noi-thang-10-2015/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-dat-internet-fpt-tai-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-dat-mang-fpt-thang-4-2015/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-dat-mang-internet-fpt-tphcm/' =>   '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-xem-k-gia-soc-thang-11/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-dien-bien/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-play-hd/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-quan-5-fpt-hcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-quan-nam-tu-liem/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-thang-6-2015/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-dat-truyen-hinh-fpt-thang-7-2015/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-fpt-play-box-2020/' => '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/khuyen-mai-lap-fpt-play-box-thang-7/' =>  '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/khuyen-mai-lap-internet-va-truyen-hinh-fpt/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-mang-adsl-fpt-thang-6-2015/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/khuyen-mai-lap-mang-cap-quang-fpt-gia-re-thang-12/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-gia-re-thang-7-2015/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-huyen-thanh-tri/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-thang-2-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-thang-3-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-thang-5-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-thang-6-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-mien-phi-lap-dat-tang-modem-tri-gia-2-200-000d/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-cho-khach-hang-quan-hoan-kiem-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-chung-cu-the-manor-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-cuc-soc-thang-112016/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-gia-lai/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-ha-noi-gia-re-cho-moi-nha/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-hai-phong/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-hcm/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-ho-chi-minh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-bach-khoa-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-bach-mai-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-buoi-quan-tay-ho/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-cat-linh-quan-dong-da/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-cau-den-quan-hai-ba-trung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-dich-vong-quan-cau-giay/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-dong-nhan-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-hoang-van-thu-quan-dong-da/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-kham-thien-quan-dong-da/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-pham-dinh-ho-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-quynh-loi-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-tho-quan-quan-dong-da/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-thuy-phuong-va-quan-bac-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-tran-phu-quan-hoang-mai/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-tu-lien-quan-tay-ho/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-vinh-hung-quan-hoang-mai/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-phuong-xuan-la-quan-tay-ho/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-quan-hoang-mai-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-quan-long-bien-thang-102016/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-quan-nam-tu-liem-thang-102016/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-tai-da-lat-thang-92015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-ha-nam/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-tai-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-tai-quan-ba-dinh-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-thang-10/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-thang-11-mien-phi-100/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-dac-biet-lap-mang-fpt-thang-12/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-thang-5/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-thang-9/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-fpt-tinh-khanh-hoa/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-internet-fpt-hcm/' => '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-mang-wifi-fpt-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt-tai-tp-hcm/' => '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-mang-wifi-fpt-thang-7-2015/' =>    '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-mang-wifi-fpt-thang-8-2015/' =>    '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-1tp-hcm/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-10-tp-hcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-11tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-12-tp-hcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-2-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-3-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-4-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-6tp-hcm/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-7-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-8-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-9-tp-hcm/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-binh-thanh-tp-hcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-quan-go-vap-tp-hcm/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-truyen-hinh-fpt-thang-122015/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/khuyen-mai-lap-wifi-fpt-tp-hcm/' =>   '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-sieu-khung-tai-fpt-binh-duong-thang-9-2015/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/ki-niem-87-nam-thanh-lap-doan-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lam-nao-de-sang-tao-noi-dung-chuan-seo/' =>   '/tin-tuc/tin-emagazine',
            '/lap-mang-fpt-sieu-re-quan-hoan-kiem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-cap-quang-fpt-tai-sai-gon/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-cap-quang-fpt-diem-10-cho-toc/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-adsl-fpt-tang-modem-wifi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-gia-dinh-tai-thai-thinh-fpt-dong-da/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-quan-binh-thanh/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tai-hcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tai-khu-vuc-my-dinh-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tai-tri-fpt-nam-tu-liem/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tai-quan-ha-dong-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tai-xuan-dinh-fpt-bac-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-cap-quang-fpt-tphcm/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-internet-cap-quang-fpt-quan-thanh-xuan/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-internet-cap-quang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-internet-fpt/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-mon-qua-hap-dan-nhan-ngay-20-10/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-gia-re/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-gia-re-tai-cau-giay/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-phuong-dich-vong-hau/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-phuong-mai-dich/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-quan-ba-dinh-ha-noi/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-tai-ba-dinh/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-tai-hue/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-fpt-pho-doi-can/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-tphcm/' =>   '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-fpt-wifi-tai-ha-noi/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-dat-internet-va-truyen-hinh-fpt-tai-chung-cu-nothern-diamond/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-mang-fpt/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-mang-fpt-chi-voi-200-000d-thang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-mang-fpt-quan-ba-dinh-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-dat-truyen-hinh-cap-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-truyen-hinh-fpt-mung-dai-le-khuyen-mai-lon/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-truyen-hinh-fpt-play-hd/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-truyen-hinh-fpt-quang-ngai/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-truyen-hinh-fpt-thang-10-mon-qua-cho-phai-dep/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-dat-wifi-fpt-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-internet-fpt/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-internet-fpt-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-internet-hai-phong/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/lap-internet-va-truyen-hinh-fpt-tai-madarin-garden/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-ky-luc-doanh-thu-fdc-duoc-thuong-nong-50-trieu/' =>   '/tin-tuc/tin-fpt',
            '/lap-mang-cap-quang-fpt-huyen-nha-be-fpt-hcm/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-long-bien/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-duong-chien-thang-gia-re-fpt-ha-dong/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-binh-duong/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-cung-van-qua-tet-don-xuan-vui/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-da-nang-gia-sieu-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-dong-nai/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-duong-cau-giay/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-duong-thanh-binh-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-duong-truong-chinh-gia-re-fpt-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-dinh-tai-nhat-tao-fpt-bac-tu-liem/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-cho-gia-dinh-va-doanh-nghiep/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/lap-mang-cap-quang-fpt-gia-re-cho-sinh-vien/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-duong-xuan-la-fpt-tay-ho/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-khu-vuc-phuong-mai-dong-da-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-cap-quang-fpt-gia-re-tai-co-nhue-bac-tu-liem/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-dao-tan-cong-vi-ba-dinh/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-dong-ngac-bac-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-duong-de-la-thanh-ba-dinh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-kim-ma-thuong/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-dinh-plaza/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-duong-nguyen-luong-bang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-pham-van-dong-bac-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-pho-nui-truc-q-ba-dinh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-phu-fpt-nam-tu-liem/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-thang-10-2015/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-ha-nam/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-hoa-binh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-hue-gia-re/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-huyen-gia-lam-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-huyen-hoai-duc/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-khu-vuc-chua-boc-gia-re-fpt-dong-da/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-khu-vuc-xa-dan-dong-da-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-mien-phi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-ao-sen-gia-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-chinh-kinh-gia-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-chua-ha/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-dich-vong/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-dich-vong-hau/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-do-quang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-hoa-bang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-pho-phan-dinh-giot-gia-re-fpt-quan-thanh-xuan/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-1-2-3-4-5-6-7-8-9-10-11-12/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-ba-dinh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-bac-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-cau-giay/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-dong-da/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-ha-dong-chi-voi-270k-thang/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-hai-ba-trung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-nam-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-tan-phu-tphcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-tay-ho-gia-re-chi-270k-thang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-thanh-xuan/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-quan-thu-duc/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-da-nang-2018/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-kim-lien-dong-da-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-lam-dong-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-ngoc-truc-dai-mo-fpt-nam-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-tp-hcm/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-trung-van-fpt-nam-tu-liem/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-tai-tt-thanh-xuan-bac/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-thang-6-sieu-re-chi-210kthang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-thang-7-gia-cuc-soc/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-thang-9-cho-gia-dinh/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/' =>  '/',
            '/lap-mang-fpt-duong-nguyen-hong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-mien-phi-huyen-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-gia-soc-tri-khach-hang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-an-giang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-binh-thuan/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-cau-giay/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-chung-cu-dai-dong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-da-nang-thang-3-uu-dai-tha-ga/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-dong-nai-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-bo-song-quan-hoa-cau-giay-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-buoi-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-hoang-quoc-viet/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-lac-long-quan-tay-ho-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-thuy-khue-tay-ho-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-tran-duy-hung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-gia-lai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-gia-re-cho-sinh-vien/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hai-ba-trung-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hai-duong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hai-phong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hcm-quan-1/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ho-chi-minh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ho-chi-minh-gia-re/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ho-chi-minh-quan-2/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hoang-mai-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-huyen-phuc-tho-tang-modem-wifi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-huyen-thach-that-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-huyen-thanh-tri-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-huyen-tu-liem-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-khu-vuc-thai-ha-fpt-quan-dong-da/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-khu-vuc-van-chuong-dong-da-su-dung-cap-quang-gia-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-khuyen-mai-dac-biet-chao-mung-8-3/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-long-bien/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-mien-phi-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-mung-nha-giao-viet-nam-mien-phi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-my-dinh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-nam-tu-liem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-24t3-thanh-xuan-complex-mien-phi-lap-dat/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-bac-tu-liem/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-co-nhue-12/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-dong-ngac-gia-re-lai-them-mien-phi-lap-dat/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-duc-thang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-minh-khai-mien-phi-lap-dat-100/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-phu-dien-trang-bi-mien-phi-modem-wifi-4-cong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-thuy-phuong-lap-dat-mang-cap-quang-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-o-phuong-xuan-dinh-gia-re-mang-khoe-dung-dinh-luot-web/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-bach-dang-quan-hai-ba-trung-gia-chi-220-000dthang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-cong-vi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-cua-dong/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-cua-nam/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-dich-vong/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-dien-bien-gia-soc-cho-moi-nha/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-dong-tam-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-dong-xuan/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-giang-vo-ba-dinh-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-hang-bac/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-hang-bai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-hang-bo/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-hang-dao/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-hang-gai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-kim-ma/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-lang-thuong-quan-dong-da-gia-sieu-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-le-dai-hanh-quan-hai-ba-trung-gia-sieu-re/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-lieu-giai-ba-dinh-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-mai-dong-quan-hoang-mai-gia-sieu-re/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-nghia-mien-phi-100/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-nghia-tan/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-ngo-thi-nham-quan-hai-ba-trung-gia-sieu-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-ngoc-ha/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-ngoc-khanh/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-o-cho-dua-gia-cuc-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-phan-chu-trinh-quan-hai-ba-trung-gia-sieu-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-pho-hue-quan-hai-ba-trung-gia-chi-220-000dthang/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-phuc-xa/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-phuong-mai-quan-dong-da-gia-cuc-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-thinh-liet-quan-dong-da-nhan-ngay-modem-wifi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-thinh-quang-quan-dong-da-gia-uu-dai-chua-tung-co/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-trang-tien/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-tuong-mai-quan-hoang-mai-gia-cuc-hap-dan/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-van-chuong-quan-dong-da-gia-re/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-van-mieu-quan-dong-da-gia-cuc-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-phuong-yen-so-quan-hoang-mai-gia-chi-tu-220-000dthang/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-1/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-3/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-ba-dinh/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-bac-tu-liem/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-binh-tan-fpt-tphcm/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-binh-thanh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-cau-giay/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-dong-da/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-go-vap/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-ha-dong/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-dong/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-hai-ba-trung-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-hoan-kiem/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-hoan-kiem/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-hoang-mai/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-long-bien/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-nam-tu-liem/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-tan-binh-fpt-hcm/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-thanh-xuan/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-quan-thanh-xuan-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-bac-giang/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-bac-ninh/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-binh-duong/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-cao-bang/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-cc-hapulico-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-mang-fpt-tai-chung-cu-ct6-xa-la-bemes-ha-dong-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang-fpt-gia-re-tai-doan-ke-thien-mai-dich-cau-giay/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-da-lat-fpt-lam-dong/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-da-nang/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-dang-van-ngu-dong-da-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-dong-thap/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-hai-duong/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-ho-guom-plaza-tang-mien-phi-100-modem-wifi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-ho-tung-mau-fpt-cau-giay/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-hoa-binh-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-hoang-hoa-tham/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-hue/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-khi-thi-hud-tay-nam-linh-dam-mang-cap-quang-toc-cao/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-khoa-tai-chuc-dai-hoc-mo-dia-chat/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-mulberry-lane-kdt-mo-lao/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-my-dinh-nam-tu-liem-gia-sieu-re/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-ngoc-ha/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-nha-mien-phi-100/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-quan-binh-thanh/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-tn-xuan-thuy/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tai-xa-huu-hoa/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-xuan-thuy/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-tay-ho/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thang-1-2021/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-thang-vang-lap-mang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thang-32017-tai-ha-noi-mien-phi-100/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thang-4-mien-phi-tang-modem-wifi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thang-6-mien-phi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thanh-xuan/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-thuy-linh/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-tp-hcm/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-va-nhung-uu-dai-cuc-gia-tri/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-va-truyen-hinh-fpt-xuan-2015/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-mang-fpt-voi-nhieu-uu-dai/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-vung-tau/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-duong-duong-quang-ham/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-xa-me-tri-tang-modem-wifi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/khuyen-mai-lap-mang-internet-adsl-fpt-thang-7-2015/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-internet-adsl-fpt-thang-8-2015/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-internet-fpt/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-internet-fpt-tai-ha-noi/' => '/san-pham-dich-vu/internet-fpt',
            '/khuyen-mai-lap-mang-internet-fpt/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt-da-nang/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt-mien-phi/' =>   '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt-quan-binh-thanh-fpt-hcm/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-mang-wifi-fpt-thang-9/' =>    '/san-pham-dich-vu/internet-fpt',
            '/lap-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-truyen-hinh-fpt-don-nam-moi-dinh-dau-2017/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-truyen-hinh-fpt-phuong-nam-dong-gia-sieu-re/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-wifi-fpt-da-nang/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-wifi/' => '/san-pham-dich-vu/internet-fpt',
            '/lap-wifi-fpt-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-wifi-fpt-tien-giang/' =>  '/san-pham-dich-vu/internet-fpt',
            '/lap-wifi-fpt-tp-hcm/' =>  '/san-pham-dich-vu/internet-fpt',
            '/mien-phi-100-lap-mang-fpt-phuong-linh-nam-quan-hoang-mai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-dai-kim-quan-hoang-mai/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-hang-bot-quan-dong-da/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-phuong-lien-quan-dong-da/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-quoc-tu-giam-quan-dong-da/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-thanh-tri-quan-hoang-mai/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-trung-liet-quan-dong-da/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-phi-lap-mang-fpt-phuong-yen-phu-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/mien-que-tien-cua-350-nguoi-fpt-o-chau-au/' =>    '/tin-tuc/tin-fpt',
            '/mo-ban-combo-internet-truyen-hinh-fpt-goi-f6-chi-265-000dthang/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/mu-chelsea-nghet-tho-phut-bu-gio-tren-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/mua-fpt-playbox-2018-xem-serie-a-that-phe-pha/' =>    '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/ngay-30-07-2014-su-co-dut-cap-bien-quoc-te-aag-se-khac-phuc-xong/' => '/tin-tuc/tin-fpt',
            '/nguoi-ftel-tich-cuc-tham-gia-thi-trang-fpt-2014/' =>  '/tin-tuc/tin-fpt',
            '/nguoi-phan-mem-lam-viec-quen-noel/' =>    '/tin-tuc/tin-fpt',
            '/nha-thong-mo-co-hoi-hen-ho-cho-gai-xinh-trai-e-toan-fpt/' =>  '/tin-tuc/tin-fpt',
            '/nhung-loi-thuong-gap-cua-hd-box-fpt/' =>  '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/tinh-nang-tren-fpt-play-box/' =>  '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/qua-tang-thang-3-lap-mang-cap-quang-fpt-sieu-re/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/quy-dinh-dat-coc-diem-den-khi-lap-mang-fpt/' =>   '/',
            '/sales-boot-camp-no-5-thu-viec-4-ngay-nhan-viec-lien-tay/' =>  '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/san-pham-fpt-ihome/' =>   '/san-pham-dich-vu/smart-home/fpt-ihome',
            '/san-pham-fpt-play-box/' =>    '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/sang-tao-dac-biet-cua-chinh-nhan-vien-fpt-telecom/' =>    '/tin-tuc/tin-fpt',
            '/sieu-khuyen-mai-dang-ky-lap-mang-fpt-phuong-dinh-cong/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/sieu-khuyen-mai-lap-mang-fpt-phuong-lang-ha-quan-dong-da/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/sieu-pham-sanh-doi-combo-internet-truyen-hinh-fpt-chung-cu-the-manor-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/tai-sao-ban-nen-lam-viec-tai-fpt-telecom/' => '/',
            '/tai-sao-ban-nen-dang-ky-cap-quang-fpt-cho-gia-dinh/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tai-sao-khach-hang-nen-lua-chon-lap-mang-fpt/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tai-sao-nuoc-mat-roi-voi-ai-cung-can-co-tet/' =>  '/tin-tuc/tin-fpt',
            '/tet-dinh-dau-tren-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/thang-8-vang-tri-an-cung-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/thong-bao-bo-sung-3-kenh-truyen-hinh-len-he-thong/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/thong-bao-tang-so-luong-kenh-truyen-hinh-xem-lai/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/thu-chuc-mung-gia-nhap-clb-best-seller-ftel-fox-1k-club/' =>  '/tin-tuc/tin-fpt',
            '/media-player/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/tinh-nang-movie-finder-tren-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/tinh-nang-vuot-troi-cua-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/toc-do-mang-cap-quang-fpt-tang-cuc-soc/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-cap-quang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-mang-cap-quang-fpt/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-dong-da-ha-noi/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-mang-fpt-gia-re-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-mang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-mang-fpt-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-mang-fpt-ho-chi-minh/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/tong-dai-lap-wifi-fpt/' =>    '/san-pham-dich-vu/internet-fpt',
            '/tong-hop-thiet-bi-modem-cua-fpt/' =>  '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/tong-hop-cac-kenh-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/tri-an-khach-hang-lap-mang-fpt-phuong-minh-khai-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/truyen-hinh/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-tan-tam-vi-khach-hang/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-cung-trai-nghiem-va-bat-kip-tung-khoanh-khac-xin-nhat/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/fpt-play-hd/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-chuong-trinh-danh-cho-thieu-nhi/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-su-ket-hop-day-sang-tao-khoi-nguon-dam-me/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-the-gioi-giai-tri-trong-tam-tay/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-truyen-hinh-tuong-tac-4k/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-binh-duong/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-binh-duong-khuyen-mai-dac-biet-chao-mung-2011/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-binh-thuan-su-khac-biet-day-ngau-hung/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-bo-sung-02-kenh-truyen-hinh-quoc-hoi-hd-va-phu-tho/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-bo-sung-13-kenh-truyen-hinh-dia-phuong/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-cap-nhat-them-5-kenh-truyen-hinh-dia-phuong/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-da-lat-bien-khong-the-thanh-co-the/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-da-nang/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-dong-nai/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-ha-nam/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-ha-noi/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-hai-duong/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-hoa-binh/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-lam-dong/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-ngung-phat-song-cac-kenh-vtv-cap/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-ninh-binh/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-play-box/' => '/san-pham-dich-vu/dich-vu-online/fpt-play-box',
            '/truyen-hinh-fpt-play-hd-mien-phi-tren-dien-thoai-thong-minh/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-ba-dinh/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-bac-tu-liem-ha-noi/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-cau-giay/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-dong-da/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-ha-dong/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-hoan-kiem/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-hoang-mai/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-nam-tu-liem/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-tay-ho/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-quan-thanh-xuan/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-ra-mat-sieu-pham-fpt-tv-dep-hon-thong-minh-hon/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-tai-tp-hcm/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thang-2-2015-khuyen-mai-cuc-soc/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thang-3-chi-voi-38-000-dong-thang/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thay-ao-moi/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thong-bao-cap-nhat-danh-sach-kenh/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thong-bao-cap-nhat-kenh/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-thong-bao-quy-hoach-goi-cuoc-moi/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-fpt-luon-moi-la-moi-ngay/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-hd/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/truyen-hinh-internet-fpt/' => '/san-pham-dich-vu/internet-fpt',
            '/truyen-hinh-only-tv/' =>  '/san-pham-dich-vu',
            '/truyen-hinh-only-tv-xem-tv-chua-bao-gio-thu-vi-the/' =>   '/san-pham-dich-vu',
            '/truyen-hinh-tuong-tac-fpt-tien-phong-dan-dau-cong-nghe/' =>   '/san-pham-dich-vu',
            '/tu-nghiep-tro-thanh-ceo-tre-nhat-fpt/' => '/tin-tuc/tin-fpt',
            '/tuyen-cap-quang-bien-quoc-te-aag-lai-dut/' => '/tin-tuc/tin-fpt',
            '/tuyen-dung-thu-ngan-lam-viec-tai-fpt-telecom/' => '/',
            '/tuyen-nhan-vien-ky-thuat-fpt/' => '/',
            '/su-dung-kho-tai-nguyen-cong-nghe-mien-phi-tai-smac-challenge/' => '/tin-tuc/tin-fpt',
            '/ung-dung-hi-fpt-cham-lien-tay-ho-tro-ngay/' =>    '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            '/update-khuyen-mai-lap-mang-fpt-tu-fpt-telecom/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/update-phim-bom-tan-thang-12-voi-dich-vu-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/update-tinh-hinh-thoi-tiet-moi-nhat-voi-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-combo-internet-va-truyen-hinh-fpt-tai-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/uu-dai-dac-biet-combo-internet-va-truyen-hinh-fpt-thang-102016/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/uu-dai-dac-biet-danh-cho-sinh-vien-lap-mang-fpt/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-dac-biet-fpt-danh-cho-phai-dep-nhan-ngay-83/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-goi-combo-internettruyen-hinh-fpt-khai-xuan-2016/' =>  '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/uu-dai-hap-dan-khi-lap-truyen-hinh-fpt-phuong-dich-vong-cau-giay/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-khach-hang-dang-dung-internet-dang-ky-them-truyen-hinh-fpt/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-lap-cap-quang-fpt-ha-noi-thang-22017-tang-4-thang-cuoc/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-dat-internet-fpt-tai-quan-dong-da-ha-noi/' =>  '/san-pham-dich-vu/internet-fpt',
            '/uu-dai-lap-dat-truyen-hinh-fpt-thang-62016/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-lap-mang-cap-quang-fpt-danh-cho-sinh-vien/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-cap-quang-fpt-mien-phi-tai-ha-noi/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-cap-quang-fpt-thang-42016/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-cap-quang-fpt-thang-82016/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi-2/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-tp-hcm/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-mung-sinh-nhat-fpt-thang-92016/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-nhan-dip-don-tet-dinh-dau-tai-quan-thanh-xuan/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-dong-mac-quan-hai-ba-trung/' =>    '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-hoang-liet-quan-hoang-mai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-kim-lien-quan-dong-da/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-nguyen-du-quan-hai-ba-trung/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-nhat-tan-quan-tay-ho/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-quang-trung-quan-dong-da/' =>  '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-phuong-thanh-luong-quan-hai-ba-trung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-tai-ha-noi-don-nam-moi-dinh-dau-2017/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-tai-quan-hai-ba-trung-ha-noi/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-tai-quan-hoang-mai/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-mang-fpt-tai-tp-ho-chi-minh-nhan-dip-tet-dinh-dau/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lap-truyen-hinh-fpt-phuong-chuong-duong/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-lap-truyen-hinh-fpt-thang-12016/' =>   '/san-pham-dich-vu/truyen-hinh-fpt',
            '/uu-dai-lon-combo-internet-va-truyen-hinh-fpt-chi-265kthang/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/combo-internettruyen-hinh-fpt-tung-bung-don-giang-sinh/' =>   '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/uu-dai-lon-lap-cap-quang-fpt-chao-nam-moi-2016/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/uu-dai-lon-lap-dat-combo-internet-va-truyen-hinh-fpt-thang-82016/' => '/san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt',
            '/lap-dat-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/tang-ip-tinh-free-khi-lap-mang-fpt/' =>   '/san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep',
            '/uu-dai-truyen-hinh-fpt-nhan-ngay-quoc-te-phu-nu/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/van-hoa-va-moi-truong-tai-fpt-telecom/' =>    '/tin-tuc/tin-fpt',
            '/vff-ke-hanh-hung-cdv-viet-nam-phai-bi-trung-tri/' =>  '/tin-tuc/tin-emagazine',
            '/video-gioi-thieu-ve-truyen-hinh-fpt/' =>  '/san-pham-dich-vu/truyen-hinh-fpt',
            '/xem-truyen-hinh-chuan-hd-chi-bang-hai-bat-pho/' =>    '/san-pham-dich-vu/truyen-hinh-fpt',

            '/khuyen-mai/khuyen-mai-lap-truyen-hinh-fpt/' => '/san-pham-dich-vu/truyen-hinh-fpt',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-hoang-mai/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-hai-ba-trung-lap-mang-fpt-3/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-tay-ho/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-long-bien/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dich-vu-truyen-hinh-fpt/truyen-hinh-fpt-hcm/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/dich-vu-truyen-hinh-fpt/truyen-hinh-only-tv/' => '',
            '/fpt-telecom-ho-tro-khach-hang/ho-tro-khach-hang-mat-mang-internet-fpt/' => '',
            '/lap-mang-cap-quang/lap-mang-cap-quang-fpt-ha-noi/lap-mang-cap-quang-fpt-huyen-gia-lam/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/fpt-telecom-ho-tro-khach-hang/ho-tro-ki-thuat/modem-wifi/' => '',
            '/khuyen-mai/khuyen-mai-lap-mang-fpt/' => '',
            '/lap-mang-cap-quang/lap-mang-cap-quang-fpt-ha-noi/lap-mang-cap-quang-fpt-quan-bac-tu-liem/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang/lap-mang-cap-quang-fpt-ha-noi/lap-mang-cap-quang-fpt-quan-ha-dong/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-cap-quang/lap-mang-cap-quang-fpt-ha-noi/lap-mang-cap-quang-fpt-quan-hai-ba-trung/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-ha-dong-lap-mang-fpt-3/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/truyen-hinh-fpt-tai-ha-noi/page/2/' => '/san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan',
            '/gioi-thieu-ve-fpt-telecom/page/8' => '/',
            '/wp-content/uploads/2018/07/chuong-trinh-thieu-nhi-310x165.png' => '/',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-hoang-mai' => '/',
            '/khuyen-mai-lap-mang-cap-quang-fpt-va-truyen-hinh-fpt/page/3' => '/',
            '/lap-mang-fpt-ha-noi-mien-phi/lap-mang-fpt-quan-hai-ba-trung-lap-mang-fpt-3' => '/',

            '/khuyen-mai-lap-mang-cap-quang-fpt-va-truyen-hinh-fpt/page/3' => '/',
            '/san-pham-dich-vu/truyen-hinh-fpt/product-details-external.html' => '/',

            '/dang-ky-cap-quang-fpt-hcm-gia-re-thang-7-2015/product-details-external.html' => '/',
            '/dang-ky-cap-quang-fpt-hcm-gia-re-thang-7-2015/product-details.html' => '/',
            '/truyen-hinh-fpt-tai-ha-noi/dang-ky-online.html' => '/',
            'lap-mang-fpt-ha-noi-mien-phi/product-details.html' => '/',


            '/ho-tro-khach-hang-mat-mang-internet-fpt' => '/ho-tro/ho-tro-thong-tin/huong-dan-su-dung',
            'test' => 'testtest',

        ];
    }
}
