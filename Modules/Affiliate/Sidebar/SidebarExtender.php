<?php

namespace Modules\Affiliate\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('affiliate::sidebar.affiliate'), function (Item $item) {
                $item->icon('fa fa-handshake-o');
                $item->weight(10);
                $item->route('admin.affiliate_products.index');
                $item->authorize(
                    $this->auth->hasAnyAccess([
                        'admin.affiliate.products.index',
                    ])
                );

                $item->item(trans('affiliate::sidebar.products'), function (Item $item) {
                    $item->weight(1);
                    $item->route('admin.affiliate_products.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.affiliate.products.index')
                    );
                });
            });
        });
    }
}
