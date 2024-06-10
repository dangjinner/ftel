<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class AffiliateAccountTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('affiliate::accounts.tabs.groups.basic_info'))
            ->active()
            ->add($this->general())
            ->add($this->users());
    }

    private function general()
    {
        return tap(new Tab('general', trans('affiliate::accounts.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(1);
            $tab->fields(['user_id', 'first_name', 'last_name', 'email', 'phone_number', 'status']);
            $tab->view('affiliate::admin.accounts.tabs.general', [

            ]);
        });
    }

    private function users()
    {
        return tap(new Tab('users', trans('affiliate::accounts.tabs.user')), function (Tab $tab) {
            $tab->weight(2);
            $tab->fields(['users']);
            $tab->view('affiliate::admin.accounts.tabs.users');
        });
    }
}
