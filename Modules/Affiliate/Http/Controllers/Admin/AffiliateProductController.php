<?php

namespace Modules\Affiliate\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Affiliate\Entities\AffiliateProduct;
use Modules\Affiliate\Http\Requests\SaveAffiliateProductRequest;

class AffiliateProductController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AffiliateProduct::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'affiliate::products.products';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'affiliate::admin.products';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveAffiliateProductRequest::class;

    protected $routePrefix = 'admin.affiliate_products';
}
