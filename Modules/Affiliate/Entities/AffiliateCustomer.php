<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Affiliate\Admin\AffiliateCustomerTable;

class AffiliateCustomer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'service_option',
        'note',
        'ip',
        'utm_source',
        'utm_medium',
        'utm_content',
        'utm_campaign',
        'utm_term',
        'from_page_url',
        'aff_code',
    ];

    public function table($request)
    {
        $query = $this->newQuery();

        return new AffiliateCustomerTable($query);
    }
}
