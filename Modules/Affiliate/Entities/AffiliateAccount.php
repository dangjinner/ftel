<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Affiliate\Admin\AffiliateAccountTable;

class AffiliateAccount extends Model
{
    use SoftDeletes;

    const PENDING = 2;
    const ACTIVE = 1;
    const DEACTIVATE = 0;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'status',
    ];

    protected $appends = [
        'full_name'
    ];

    protected static function boot()
    {
        parent::boot();;

        static::creating(function ($affiliateProduct) {

            if (!empty(request()->all())) {
                $userIds = request()->get('users');

                if(isset($userIds[0])) {
                    $affiliateProduct->user_id = $userIds[0];
                }
            }
        });
    }

    public function table($request)
    {
        $query = $this->newQuery();

        return new AffiliateAccountTable($query);
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }
}
