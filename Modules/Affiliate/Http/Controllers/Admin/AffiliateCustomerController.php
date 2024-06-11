<?php

namespace Modules\Affiliate\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
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

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $entity = $this->getEntity($id);

        $this->disableSearchSyncing();
        DB::beginTransaction();
        try {
            $entity->update(
                $this->getRequest('update')->all()
            );

            if($this->getRequest('update')->get('status') == AffiliateCustomer::COMPLETED) {
                $link = $entity->link()->firstOrFail();
                $product = $link->product()->firstOrFail();
                $account = $link->account()->firstOrFail();
                $account->update([
                    'total_commission' => $account->total_commission + $product->fm_commission->amount()
                ]);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


        $this->searchable($entity);

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo($entity)
                ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
        }

        return redirect()->route("{$this->getRoutePrefix()}.index")
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    }
}
