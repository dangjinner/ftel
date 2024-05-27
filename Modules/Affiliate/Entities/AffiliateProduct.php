<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;
use Modules\Affiliate\Admin\AffiliateProductTable;
use Modules\Media\Eloquent\HasMedia;
use Modules\Media\Entities\File;
use Modules\Support\Money;

class AffiliateProduct extends Model
{
    use SoftDeletes, HasMedia;

    protected $fillable = [
        'name',
        'type',
        'page_url',
        'cookie_duration',
        'is_set_cookie',
        'info',
        'description',
        'page_url',
        'commission',
        'commission_type',
        'price',
        'status',
    ];

    const FOR_PRODUCT_AND_SERVICE = 1;
    const FOR_URL = 2;
    const COMMISSION_MONEY = 1;
    const COMMISSION_PERCENT = 2;

    protected $appends = [
        'fm_commission'
    ];

    /**
     * Get the product's base image.
     *
     * @return \Modules\Media\Entities\File
     */
    public function getBaseImageAttribute()
    {
        return $this->files->where('pivot.zone', 'base_image')->first() ?: new File;
    }

    public function scopeWithBaseImage($query)
    {
        $query->with(['files' => function ($q) {
            $q->wherePivotIn('zone', ['base_image']);
        }]);
    }

    public function getOriginalLinkAttribute()
    {
        if($this->type == self::FOR_PRODUCT_AND_SERVICE) {
            return route('pages.individualFiber');
        }

        return URL::to($this->page_url);
    }

    public function links()
    {
        return $this->hasMany(AffiliateLink::class, 'aff_product_id', 'id');
    }

    public function ownLinks()
    {
        return $this->links()->where('user_id', auth()->id());
    }

    public function getFmCommissionAttribute()
    {
        $commission = $this->commission;

        if($this->commission_type == self::COMMISSION_PERCENT) {
            $commission = ($this->commission / 100) * $this->price;
        }

        return Money::inDefaultCurrency($commission);
    }

    public function table($request)
    {
        $query = $this->newQuery();

        return new AffiliateProductTable($query);
    }
}
