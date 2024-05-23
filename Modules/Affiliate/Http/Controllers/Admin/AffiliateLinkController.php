<?php

namespace Modules\Affiliate\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Entities\AffiliateLink;
use Modules\Affiliate\Http\Requests\SaveAffiliateLinkRequest;

class AffiliateLinkController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AffiliateLink::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'affiliate::links.links';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'affiliate::admin.links';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveAffiliateLinkRequest::class;

    protected $routePrefix = 'admin.affiliate_links';

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->disableSearchSyncing();

        $data = $this->getRequest('store')->all();
        $affAccount = AffiliateAccount::find($data['aff_account_id']);

        if($affAccount) {
            $data['user_id'] = $affAccount->id;
            $data['code'] = $this->generateUniqueCode();
        }

        $entity = $this->getModel()->create($data);

        $this->searchable($entity);

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo($entity);
        }

        return redirect()->route("{$this->getRoutePrefix()}.index")
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    }

    private function generateUniqueCode()
    {
        $code = Str::random(10);
        $checkExist = AffiliateLink::where('code', $code)->exists();

        if(!$checkExist) {
            return $code;
        }
        return $this->generateUniqueCode();
    }
}
