<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class AffiliateLinkTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('affiliate::links.tabs.groups.basic_info'))
            ->active()
            ->add($this->general())
            ->add($this->accounts())
            ->add($this->products());
    }

    private function general()
    {
        return tap(new Tab('general', trans('affiliate::links.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(1);
            $tab->fields(['utm_source', 'utm_campaign', 'utm_content', 'utm_medium', 'status']);
            $tab->view('affiliate::admin.links.tabs.general', [

            ]);
        });
    }

    private function accounts()
    {
        return tap(new Tab('accounts', trans('affiliate::links.tabs.account')), function (Tab $tab) {
            $tab->weight(2);
            $tab->fields(['accounts']);
            $tab->view('affiliate::admin.links.tabs.accounts');
        });
    }

    private function products()
    {
        return tap(new Tab('products', trans('affiliate::links.tabs.product')), function (Tab $tab) {
            $tab->weight(3);
            $tab->fields(['products']);
            $tab->view('affiliate::admin.links.tabs.products');
        });
    }
}
