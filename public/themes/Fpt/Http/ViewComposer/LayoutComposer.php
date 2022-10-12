<?php

namespace Themes\Fpt\Http\ViewComposer;

use Illuminate\Support\Facades\Cache;
use Modules\Media\Entities\File;
use Modules\Menu\Entities\Menu;
use Themes\Fpt\Banner;

class LayoutComposer {
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
            'copyrightLogo' => $this->getMedia(setting('copyright_logo'))
        ];
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    public function getServicesThumbnail($fileIds)
    {
        if($fileIds == null) {
            $fileIds = [];
        }
        $files = File::whereIn('id', $fileIds)->get();   
        return $files;     
    }

   
}