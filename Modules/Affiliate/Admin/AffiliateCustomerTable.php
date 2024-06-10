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
    protected $rawColumns = [];

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
            });
    }
}
