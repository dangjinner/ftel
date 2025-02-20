<?php

namespace Themes\Fpt\Http\ViewComposer;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Modules\Affiliate\Entities\AffiliateLink;
use Modules\Media\Entities\File;
use Modules\Menu\Entities\Menu;
use Themes\Fpt\Banner;

class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            // 'footerMenu' => $this->getFooterMenu(),
            // 'footerLogo' => $this->getFooterLogo(),
            // 'servicesThumbnail' => $this->getServicesThumbnail(setting('footer_services_thumbnail')),
            'primaryMenu' => $this->getPrimaryMenu(),
            'registerServiceOptions' => $this->getRegisterServiceOption(),
            'footerBanner' => $this->getFooterBanner(),
            'contactPhone' => $this->getContactPhone(),
        ]);
    }

    public function getPrimaryMenu()
    {
        // dd($this->getMenu(8)[0]->children()->first());
        return $this->getMenu(5);
    }

    public function getFooterMenu()
    {
        return [
            'menu01' => $this->getMenu(5),
            'menu02' => $this->getMenu(6),
            'menu03' => $this->getMenu(7),
        ];
    }

    public function getMenu($menuId)
    {
        return Menu::for($menuId);
    }

    public function getFooterLogo()
    {
        return [
            'copyrightLogo' => $this->getMedia(setting('copyright_logo')),
        ];
    }

    public function getFooterBanner()
    {
        return $this->getMedia(setting('fpt_footer_banner'));
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    public function getServicesThumbnail($fileIds)
    {
        if ($fileIds == null) {
            $fileIds = [];
        }
        $files = File::whereIn('id', $fileIds)->get();
        return $files;
    }

    public function getRegisterServiceOption()
    {
        $services = [];
        for ($i = 1; $i <= 10; $i++) {
            $service = setting('register_form_service_option_' . $i);
            if ($service) {
                $services[] = $service;
            }
        }
        return $services;
    }

    private function getMediaFiles($fileIds)
    {
        if ($fileIds == null) {
            $fileIds = [];
        }
        $files = File::whereIn('id', $fileIds)->get();
        return $files;
    }

    public function getFooterImages()
    {
        return $this->getMediaFiles(setting('footer_col_5_images'));
    }

    public function getContactPhone()
    {
        $affiliateCode = Cookie::get('aff_code');

        if ($affiliateCode) {
            $affiliateLink = AffiliateLink::where('code', $affiliateCode)->first();
            if ($affiliateLink) {
                $affiliateAccount = $affiliateLink->account;
                if ($affiliateAccount) {
                    return $affiliateAccount->isAgency() ? $affiliateAccount->phone_number : null;
                }
            }
        }

        return setting('fpt_hotline');
    }
}
