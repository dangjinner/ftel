<?php

namespace Modules\Affiliate\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveAffiliateLinkRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'utm_source' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_content' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'aff_product_id' => 'required|int|exists:affiliate_products,id',
            'aff_account_id' => 'required|int|exists:affiliate_accounts,id',
            'status' => 'required|boolean',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
