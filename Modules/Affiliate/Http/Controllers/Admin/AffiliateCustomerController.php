<?php

namespace Modules\Affiliate\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Affiliate\Entities\AffiliateCustomer;
use Modules\Affiliate\Http\Requests\SaveAffiliateCustomerRequest;

class AffiliateCustomerController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AffiliateCustomer::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'affiliate::customers.customers';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'affiliate::admin.customers';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveAffiliateCustomerRequest::class;

    protected $routePrefix = 'admin.affiliate_customers';
}
