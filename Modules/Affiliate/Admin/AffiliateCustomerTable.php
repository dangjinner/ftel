<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Affiliate\Entities\AffiliateCustomer;
use Modules\Affiliate\Entities\AffiliateLink;

class AffiliateCustomerTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['affiliate_account'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('status', function($affiliateCustomer) {
                $text = trans('affiliate::customers.form.status')[$affiliateCustomer->status];
                $class = "bg-warning";
                if($affiliateCustomer->status == AffiliateCustomer::COMPLETED) {
                    $class = "bg-success";
                }elseif($affiliateCustomer->status == AffiliateCustomer::REJECTED) {
                    $class = "bg-danger";
                }

                $elm = "<span class='{$class}'>{$text}</span>";
                return $elm;
            })
            ->editColumn('affiliate_account', function($affiliateCustomer) {
                $account = $affiliateCustomer->account;

                if ($account) {
                    $url = route('admin.affiliate_accounts.edit', ['id' => $account->id]);
                    return "<a href='{$url}'>{$account->full_name}</a>";
                }
                return "";
            });
    }
}
