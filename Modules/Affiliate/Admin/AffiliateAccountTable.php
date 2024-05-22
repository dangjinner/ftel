<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\AdminTable;

class AffiliateAccountTable extends AdminTable
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
            ->editColumn('status', function ($affiliateAccount) {
                $elm = '<span class="dot red"></span>';

                if($affiliateAccount->status == 1) {
                    $elm = '<span class="dot green"></span>';
                } elseif($affiliateAccount->status == 2) {
                    $elm = '<span class="dot" style="background-color: #deba06"></span>';
                }

                return $elm;
            });
    }
}
