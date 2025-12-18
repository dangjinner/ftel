<?php

namespace Themes\Fpt\Http\Controllers;

use FleetCart\Jobs\RegisterFptInternet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\Affiliate\Entities\AffiliateCustomer;
use Modules\Affiliate\Entities\AffiliateLink;
use Modules\Affiliate\Jobs\SendCustomerDataToAgencyJob;
use Modules\Page\Entities\Page;
use Themes\Fpt\Emails\RegisterOnlineMail;
use Themes\Fpt\Http\Requests\ContactFormRequest;
use Themes\Fpt\Http\Services\GoogleSheetAdsen;
use Themes\Fpt\Http\Services\GoogleSheetCustom;

class FptServiceController
{
    protected $google_sheet_adsen;

    public function __construct(GoogleSheetAdsen $google_sheet_adsen)
    {
        $this->google_sheet_adsen = $google_sheet_adsen;
    }

    public function postContactForm(ContactFormRequest $request)
    {
        $name = $request->get('cf_name');
        $phone = $request->get('cf_phone');
        $message = $request->get('cf_note') ?? '';
        $address = $request->get('cf_address');
        $service = $request->get('cf_service');

        $utmSource = request()->get('utm_source') ?? '';
        $utmMedium = request()->get('utm_medium') ?? '';
        $utmCampaign = request()->get('utm_campaign') ?? '';
        $utmTerm = request()->get('utm_term') ?? '';
        $utmContent = request()->get('utm_content') ?? '';
        $ipAddress = request()->ip();
        $currentURL = $request->get('from_page');

        $currentDate = date('d/m/Y H:i:s');

        $slugLevel1 = collect(
            explode('/', trim(parse_url($currentURL, PHP_URL_PATH), '/'))
        )->first();

        $page = Page::where('slug', $slugLevel1)->first();

        if ($page) {
            $this->handleDataForCustomizePage($request, $page);
        } else {
            $affCode = Cookie::get('aff_code');

            $this->google_sheet_adsen->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service, $message, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $ipAddress, $currentURL]
            ]);

            $this->saveAffiliateCustomer([
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'note' => $message,
                'service' => $service,
                'utm_source' => $utmSource,
                'utm_campaign' => $utmCampaign,
                'utm_term' => $utmTerm,
                'utm_content' => $utmContent,
                'utm_medium' => $utmMedium,
                'ip' => $ipAddress,
                'current_url' => $currentURL,
                'aff_code' => $affCode,
            ]);
        }

        return redirect()->route('pages.thankyou');
    }

    public function handleDataForCustomizePage(Request $request, Page $page)
    {
        $name = $request->get('cf_name');
        $phone = $request->get('cf_phone');
        $message = $request->get('cf_note') ?? '';
        $address = $request->get('cf_address');
        $service = $request->get('cf_service');
        $currentDate = date('d/m/Y H:i:s');

        $pageSettings = (array) json_decode($page->custom);

        $sheetName = $pageSettings['google_sheet_name'];
        $spreadSheetId = $pageSettings['google_sheet_key'];

        $data = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'message' => $message,
            'option_service' => $service,
            'google_sheet_link' => $pageSettings['google_sheet_link']
        ];

        $googleSheetCustom = new GoogleSheetCustom($spreadSheetId, $sheetName);
        if ($sheetName !== null && $spreadSheetId !== null) {
            $googleSheetCustom->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service, $message]
            ]);
        }

        $emailsReceive = explode(',', $pageSettings['email_receive']);

        foreach ($emailsReceive as $key => $email) {
            $emailsReceive[$key] = trim($email);
        }

        if (count($emailsReceive) > 0) {
            Mail::to($emailsReceive)->send(new RegisterOnlineMail($data));
        }
    }

    public function saveAffiliateCustomer($attributes)
    {
        $affCode = Cookie::get('aff_code');

        $affliateLink = AffiliateLink::where('code', $affCode)->first();

        $affiliateProductId = 0;
        $affiliateAccountId = 0;

        if ($affliateLink && !$affliateLink->is_expired) {
            $attributes['utm_source'] = $affliateLink->utm_source;
            $attributes['utm_campaign'] = $affliateLink->utm_campaign;
            $attributes['utm_term'] = $affliateLink->utm_term;
            $attributes['utm_medium'] = $affliateLink->utm_medium;
            $attributes['utm_content'] = $affliateLink->utm_content;
            $affiliateProductId = $affliateLink->aff_product_id;
            $affiliateAccountId = $affliateLink->aff_account_id;
        } else {
            $affCode = null;
        }

        $affiliateCustomer = AffiliateCustomer::create([
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
            'aff_code' => $affCode,
            'aff_product_id' => $affiliateProductId,
            'aff_account_id' => $affiliateAccountId,
        ]);

        SendCustomerDataToAgencyJob::dispatch($affiliateCustomer);
    }
}
