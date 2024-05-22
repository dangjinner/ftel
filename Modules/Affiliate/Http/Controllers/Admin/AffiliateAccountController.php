<?php

namespace Modules\Affiliate\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Http\Requests\SaveAffiliateAccountRequest;

class AffiliateAccountController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AffiliateAccount::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'affiliate::accounts.accounts';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'affiliate::admin.accounts';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveAffiliateAccountRequest::class;

    protected $routePrefix = 'admin.affiliate_accounts';
}
