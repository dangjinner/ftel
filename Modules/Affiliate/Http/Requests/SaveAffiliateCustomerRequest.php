<?php

namespace Modules\Affiliate\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveAffiliateCustomerRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'service_option' => 'required|string',
            'note' => 'nullable|string',
            'ip' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_source' => 'nullable|string',
            'utm_content' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_term' => 'nullable|string',
            'from_page_url' => 'nullable|string',
            'status' => 'required|int|in:1,2,3',
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
