<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateLink extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'aff_account_id',
        'aff_product_id',
        'code',
        'utm_source',
        'utm_campaign',
        'utm_content',
        'utm_medium',
        'status',
        'expired_at',
    ];
}
