<?php

namespace Modules\Affiliate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Core\Http\Requests\Request;

class SaveAffiliateProductRequest extends Request
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
            'description' => 'nullable|string',
            'info' => 'nullable|string',
            'status' => 'boolean|required',
            'type' => 'required|int|in:1,2',
            'price' => 'required|numeric',
            'commission' => 'required|numeric',
            'commission_type' => 'required|int|in:1,2',
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
