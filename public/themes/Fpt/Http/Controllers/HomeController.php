<?php

namespace Themes\Fpt\Http\Controllers;

use FleetCart\Jobs\SendMailRegister;
use Illuminate\Support\Facades\Cookie;
use Modules\Affiliate\Entities\AffiliateCustomer;
use Modules\Affiliate\Entities\AffiliateLink;
use Modules\Group\Entities\Group;
use Modules\Slider\Entities\Slider;
use Modules\Menu\Entities\Menu;
use SEO;
use SEOMeta;
use Themes\Fpt\Http\Requests\RegisterServiceRequest;
use Themes\Fpt\Http\Services\GoogleSheetCustomer;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Service\Entities\Service;
use Modules\Province\Entities\Province;
use Illuminate\Http\Request;
use Modules\Area\Entities\AreaProvince;
use Modules\Area\Entities\AreaService;
use Themes\Fpt\Http\Services\GoogleSheet;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Themes\Fpt\Emails\RegisterOnlineMail;
use Themes\Fpt\Http\Services\GoogleSheetAdsen;
use Themes\Fpt\Http\Services\GoogleSheetCustom;
use Modules\Page\Entities\Page;

class HomeController
{

    protected $google_sheet;
    protected $google_sheet_fpt;
    protected $google_sheet_adsen;

    public function __construct(GoogleSheetCustomer $google_sheet, GoogleSheet $google_sheet_fpt, GoogleSheetAdsen $google_sheet_adsen) {
        $this->google_sheet = $google_sheet;
        $this->google_sheet_fpt = $google_sheet_fpt;
        $this->google_sheet_adsen = $google_sheet_adsen;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->get('wordfence_lh')){
            return redirect()->route('home');
        }
        $data['menus'] = Menu::with('menuItems')->findOrFail(setting('fpt_menu_product_service'));

        SEO::setTitle(setting('meta_title_of_home') ?? 'FPT Telecom - [Cập nhật] các gói mạng FPT mới nhất 2021');
        SEO::setDescription(setting('meta_description_of_home') ?? 'FPT Telecom - [Update] Khuyến mại lắp mạng FPT - Wifi FPT - Cáp quang FPT - Truyền hình FPT - FPT Play Box - FPT Camera mới nhất 2021!');
        SEOMeta::addKeyword(setting('meta_keyword_of_home') ?? 'lắp mạng fpt, truyền hình fpt, wifi fpt, cáp quang fpt, fpt play box, fpt camera, fpt ihome, combo internet và truyền hình, mạng fpt');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        $data['postsFPT'] = Group::findOrFail(258)->posts()->limit(3)->get();
        $data['postsPress'] = Group::findOrFail(259)->posts()->limit(3)->get();
        $data['postsEmagazine'] = Group::findOrFail(260)->posts()->limit(3)->get();
        $data['postsKM'] = Group::findOrFail(15)->posts()->desc()->limit(6)->get();
        // dd($data['postsKM']);
        $data['slider'] = Slider::findWithSlides(setting('fpt_slider'));
        return view('public.home.' . setting('home_switcher'), $data );
    }

    public function design()
    {
        return view('public.pagebuilder.design');
    }

    public function designPost()
    {
        return 'ok';
    }

    public function customerRegister(RegisterServiceRequest $request){
        $name = $request->get('name');
        $phone = $request->get('phone');
        $address = $request->get('address') ?? '---';
        $service = $request->get('options_service') ?? '---';
        $message = $request->get('comment') ?? '---';
        $currentDate = date('d/m/Y H:i:s');
        // Custome Page for rent
        $sheetName = request()->get('google_sheet_name');
        $spreadSheetId = request()->get('google_sheet_key');
        $data = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'message' => $message,
            'option_service' => $service,
            'google_sheet_link' => request()->get('google_sheet_link'),
        ];
        $googleSheetCustom = new GoogleSheetCustom($spreadSheetId, $sheetName);
        if($sheetName !== null && $spreadSheetId !== null) {
            $googleSheetCustom->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service ,$message]
            ]);
        }
         $emailsReceive = explode(',', request()->get('email_received'));
        foreach($emailsReceive as $key => $email) {
            $emailsReceive[$key] = trim($email);
        }
        if(request()->get('email_received') !== null) {
            Mail::to($emailsReceive)->send(new RegisterOnlineMail($data));
            // $sendMail = new SendMailRegister($emailsReceive, $data);
            // dispatch($sendMail);
        } else {
            // Marketing Keywords Query Parameters
            $utmSource = request()->input('utm_source') ?? '';
            $utmMedium = request()->input('utm_medium') ?? '';
            $utmCapaign = request()->input('utm_campaign') ?? '';
            $utmTerm = request()->input('utm_term') ?? '';
            $utmContent = request()->input('utm_content') ?? '';
            $ipAddress = request()->ip();
            $currentURL = request()->input('current_url');

            $this->google_sheet_adsen->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service ,$message, $utmSource, $utmMedium, $utmCapaign, $utmTerm,  $utmContent, $ipAddress,  $currentURL]
            ]);

           $this->saveAffiliateCustomer([
               'name' => $name,
               'phone' => $phone,
               'address' => $address,
               'note' => $message,
               'service' => $service,
               'utm_source' => $utmSource,
               'utm_campaign' => $utmCapaign,
               'utm_term' => $utmTerm,
               'utm_content' => $utmContent,
               'utm_medium' => $utmMedium,
               'ip' => $ipAddress,
               'current_url' => $currentURL,
           ]);
        }
        if(request()->get('email_received') !== null) {
            return redirect()->route('home.custom.dangkydichvu.thank', ['slug' => request()->get('slug_page')]);
        }
        return redirect()->route('pages.thankyou');
    }

    public function saveAffiliateCustomer($attributes)
    {
        $affCode = Cookie::get('aff_code');
        $affliateLink = AffiliateLink::where('code', $affCode)->first();
        if($affliateLink && !$affliateLink->is_expired) {
            $attributes['utm_source'] = $affliateLink->utm_source;
            $attributes['utm_campaign'] = $affliateLink->utm_campaign;
            $attributes['utm_term'] = $affliateLink->utm_term;
            $attributes['utm_medium'] = $affliateLink->utm_medium;
            $attributes['utm_content'] = $affliateLink->utm_content;
        } else {
            $affCode = null;
        }

        AffiliateCustomer::create([
            'name' => $attributes['name'],
            'phone_number' => $attributes['phone'],
            'address' => $attributes['address'],
            'note' => $attributes['note'],
            'service_option' => $attributes['service'],
            'utm_source' => $attributes['utm_source'],
            'utm_campaign' => $attributes['utm_campaign'],
            'utm_term' => $attributes['utm_term'],
            'utm_content' => $attributes['utm_content'],
            'utm_medium' => $attributes['utm_medium'],
            'ip' => $attributes['ip'],
            'from_page_url' => $attributes['current_url'],
            'aff_code' => $affCode
        ]);
    }

    public function customerRegisterThank()
    {
        return view('public.folderkh.thank-you');
    }

     public function customThanksRegister($slug) {
        $page = Page::withoutGlobalScope('active')->where('slug', $slug)->first();
        return view('public.layouts_custom.thankyou_custom', ['page' => $page]);
    }

    public function registerOnline(Request $request)
    {

        SEO::setTitle('Đăng ký trực tuyến FPT - FPT Telecom');
        SEO::setDescription('Đăng ký trực tuyến FPT - FPT Telecom');
        SEOMeta::addKeyword('Đăng ký trực tuyến FPT - FPT Telecom');
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(route('home'));
        SEO::jsonLd()->addImage('/themes/fpt/assets/images/logo.png?v=60cc09b3d36e8');

        $data['category_services_1'] = CategoryService::findOrFail(5)->services()->get();
        $data['category_services_2'] = CategoryService::findOrFail(6)->services()->get();

        $data['area_id'] = null;

        if($request->has('locationId')) {
            $getAreaId = AreaProvince::where('province_id', $request->locationId)
            ->pluck('area_id')
            ->toArray();

                if($getAreaId != null){
                    $data['area_id'] = $getAreaId;
                    $final = [];
                    foreach ($data['area_id'] as $key => $value) {
                        $area[] = AreaService::where([['area_id', $value],['province_id',$request->locationId]])
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
                                                                ->where([['area_id', $areaId],['province_id', $provinceId],['category_service_id', 5]])
                                                                ->get();

                        $data['category_services_2'] = Service::join('area_services', 'services.id', '=', 'area_services.service_id')
                                                            ->where([['area_id', $areaId],['province_id', $provinceId],['category_service_id', 6]])
                                                            ->get();

                        $data['service_internetFpt'] = $data['category_services_1']->merge($data['category_services_2']);

                        $data['service_comboInternet'] = Service::join('area_services', 'services.id', '=', 'area_services.service_id')
                                                            ->where([['area_id', $areaId],['province_id', $provinceId],['category_service_id', 7]])
                                                            ->get();;

                        $data['services_camfpt'] = CategoryService::findOrFail(21)->services()->get();
                        $data['services_cloud'] = CategoryService::findOrFail(22)->services()->get();

                        $data['services_fptplaybox'] = CategoryService::findOrFail(12)->services()->get();

                        $data['services_ihome'] = CategoryService::findOrFail(15)->services()->first();

                        $data['provinces'] = Province::all()->pluck('name', 'id');

                        return view('public.pages.online_register', $data );
                    } else {
                        $data['service_internetFpt'] = $data['category_services_1']->merge($data['category_services_2']);

                        $data['service_comboInternet'] = CategoryService::findOrFail(7)->services()->get();
                         if(request()->get('locationId')){
                            $data['area_id'] = AreaProvince::where('province_id', request()->get('locationId'))
                            ->pluck('area_id')
                            ->toArray();
                        }

                        $data['services_camfpt'] = CategoryService::findOrFail(21)->services()->get();
                        $data['services_cloud'] = CategoryService::findOrFail(22)->services()->get();

                        $data['services_fptplaybox'] = CategoryService::findOrFail(12)->services()->get();

                        $data['services_ihome'] = CategoryService::findOrFail(15)->services()->first();

                        $data['provinces'] = Province::all()->pluck('name', 'id');

                        return view('public.folderkh.page.register_online', $data );
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
            return view('public.folderkh.page.register_online', $data );
    }

    public function postContactForm(RegisterServiceRequest $request)
    {
        if($this->checkSpam($request))
        {
            $name = $request->get('name');
            $phone = $request->get('phone');
            $address = $request->get('address');
            $service = $request->get('options_service');
            $message = $request->get('comment') ?? '---';
            $currentDate = date('d/m/Y H:i:s');
            $email = '---';
            $houseType = '---';
            $ipAddress = $request->ip();

            // $this->google_sheet_fpt->saveDataToSheet([
            //     [$name, $email ,$phone, $address, $houseType, $service, $message, $currentDate]
            // ]);
            // Marketing Keywords Query Parameters
            $utmSource = request()->input('utm_source') ?? '';
            $utmMedium = request()->input('utm_medium') ?? '';
            $utmCapaign = request()->input('utm_campaign') ?? '';
            $utmTerm = request()->input('utm_term') ?? '';
            $utmContent = request()->input('utm_content') ?? '';
            $ipAddress = request()->ip();
            $this->google_sheet_adsen->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service ,$message, $utmSource, $utmMedium, $utmCapaign, $utmTerm,  $utmContent, $ipAddress]
                // [$currentDate, $name, $phone, $address, $service ,$message]
            ]);
            return view('public.mail.thank_you');
        }
        return redirect()->back()->withErrors('The message is considered spam')->withInput();

    }

    private function checkSpam(RegisterServiceRequest $request)
    {
        $inputs = $request->all();
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret'   => config('services.google_recaptcha.secret'),
                'response' => $inputs['recaptcha_token'],
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        if (!empty($result) && is_object($result)
            && $result->success
            && $result->action === $inputs['recaptcha_action']) {
            if ($result->score >= 0.5) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}

