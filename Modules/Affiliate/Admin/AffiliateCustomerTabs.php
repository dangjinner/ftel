<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class AffiliateCustomerTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('affiliate::customers.tabs.groups.basic_info'))
            ->active()
            ->add($this->general())
            ->add($this->additional());
    }

    private function general()
    {
        return tap(new Tab('general', trans('affiliate::customers.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(1);
            $tab->fields(['name', 'phone_number', 'address', 'service_option', 'note']);
            $tab->view('affiliate::admin.customers.tabs.general', [

            ]);
        });
    }

    private function additional()
    {
        return tap(new Tab('additional', trans('affiliate::customers.tabs.additional')), function (Tab $tab) {
            $tab->weight(2);
            $tab->fields(['ip', 'utm_medium', 'utm_source', 'utm_content', 'utm_campaign', 'utm_term', 'from_page_url']);
            $tab->view('affiliate::admin.customers.tabs.additional', [

            ]);
        });
    }
}
