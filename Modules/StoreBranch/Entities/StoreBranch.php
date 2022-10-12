<?php

namespace Modules\StoreBranch\Entities;

use Modules\Support\Eloquent\Model;
use Modules\StoreBranch\Admin\StoreBranchTable;
class StoreBranch extends Model
{
    protected $table = 'store_branches';

    protected $fillable = [
        'name',
        'address',
        'hotline_sales',
        'switchboard_cskh',
        'latitude',
        'longitude',
        'time_work',
        'province_id'
    ];

    public function table()
    {
        return new StoreBranchTable($this->newQuery()->withoutGlobalScope('active'));
    }
}
