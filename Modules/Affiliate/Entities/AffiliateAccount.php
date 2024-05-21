<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'status',
    ];
}
