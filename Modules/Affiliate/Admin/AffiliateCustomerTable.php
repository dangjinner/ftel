<?php

namespace Modules\Affiliate\Admin;

use Modules\Admin\Ui\AdminTable;

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
        return $this->newTable();
    }
}
