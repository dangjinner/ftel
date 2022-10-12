<?php

namespace Themes\Fpt\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.system'), function (Group $group) {
            $group->item(trans('admin::sidebar.appearance'), function (Item $item) {
                $item->item(trans('fpt::sidebar.fpt'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.fpt.settings.edit');
                });
            });
        });
    }
}




    

