<?php

namespace Modules\StoreBranch\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\StoreBranch\Entities\StoreBranch;

class StoreBranchTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['address'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->removeColumn('thumbnail')
            ->removeColumn('status')
            ->addColumn('address', function(StoreBranch $storeBranch){
                return $storeBranch->address;
            });
    }
}
