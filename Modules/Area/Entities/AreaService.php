<?php

namespace Modules\Area\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Service\Entities\Service;
use Modules\Area\Admin\AreaTable;
use Modules\Core\Entities\Province;
use TypiCMS\NestableTrait;
use Illuminate\Support\Facades\Cache;


class AreaService extends Model
{

    protected $table = 'area_services';

    protected $fillable = [
        'area_id',
        'service_id',
        'type',
        'price_area',
        'price_area_discount',
        'province_id'
    ];
}
