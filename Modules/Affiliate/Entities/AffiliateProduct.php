<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Affiliate\Admin\AffiliateProductTable;
use Modules\Media\Eloquent\HasMedia;
use Modules\Media\Entities\File;

class AffiliateProduct extends Model
{
    use SoftDeletes, HasMedia;

    protected $fillable = [
        'name',
        'info',
        'description',
        'page_url',
        'commission',
        'status',
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

    public function table($request)
    {
        $query = $this->newQuery();

        return new AffiliateProductTable($query);
    }
}
