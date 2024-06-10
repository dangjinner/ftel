<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\AdminTable;

class AffiliateProductTable extends AdminTable
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
            ->editColumn('thumbnail', function ($affiliateProduct) {
                return view('admin::partials.table.image', [
                    'file' => $affiliateProduct->base_image,
                ]);
            })
            ->editColumn('status', function ($affiliateProduct) {
                return $affiliateProduct->status
                    ? '<span class="dot green"></span>'
                    : '<span class="dot red"></span>';
            });
    }
}
