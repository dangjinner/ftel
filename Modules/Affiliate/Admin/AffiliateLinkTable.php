<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\AdminTable;

class AffiliateLinkTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['product', 'account', 'affLink'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('product', function ($affiliateLink) {
                $productLink = route('admin.affiliate_products.edit', ['id' => $affiliateLink->product->id]);
                return "<a href='{$productLink}'>{$affiliateLink->product->name}</a>";
            })
            ->editColumn('account', function ($affiliateLink) {
                $productLink = route('admin.affiliate_accounts.edit', ['id' => $affiliateLink->account->id]);
                return "<a href='{$productLink}'>{$affiliateLink->account->email}</a>";
            })
            ->editColumn('status', function ($affiliateLink) {
                return $affiliateLink->status
                    ? '<span class="dot green"></span>'
                    : '<span class="dot red"></span>';
            })
            ->editColumn('affLink', function ($affiliateLink) {
                $affLink = $affiliateLink->ctv_link;
                return "<a href='{$affLink}' >{$affiliateLink->code}</a>";
            });
    }
}
