<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;
use Modules\Affiliate\Admin\AffiliateLinkTable;

class AffiliateLink extends Model
{
    use SoftDeletes;

    const ACTIVE = 1;
    const DEACTIVATE = 0;

    const SHORT_LINK_DEACTIVATE = 0;
    const SHORT_LINK_ACTIVATE = 1;

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
        'is_short_link'
    ];

    protected $appends = [
        'ctv_link'
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

    public function customers()
    {
        return $this->hasMany(AffiliateCustomer::class, 'aff_code', 'code');
    }

    public function getCtvLinkAttribute()
    {
        if ($this->is_short_link) {
            return route('affiliate.ctv.link', ['code' => $this->code]);
        }

        $product = $this->product()->first();
        $redirectUrl = '/';

        if ($product) {
            $redirectUrl = $product->page_url;
        }

        $params = http_build_query([
            'affCode' => $this->code,
            'cookie_time' => $product->cookie_time,
            'set_cookie' => $product->is_set_cookie ? 'true' : 'false'
        ]);

        return URL::to($redirectUrl) . '?' . $params;
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->format('H:i d/m/Y');
    }
}
