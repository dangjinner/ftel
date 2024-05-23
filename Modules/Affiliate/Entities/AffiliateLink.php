<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Affiliate\Admin\AffiliateLinkTable;

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

    public function table($request)
    {
        $query = $this->newQuery()
            ->with(['account', 'product']);

        return new AffiliateLinkTable($query);
    }

    public function account()
    {
        return $this->belongsTo(AffiliateAccount::class, 'aff_account_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(AffiliateProduct::class, 'aff_product_id', 'id');
    }

    public function ctvUrl()
    {
        return route('pages.individualFiber', ['affCode' => $this->code]);
    }
}
