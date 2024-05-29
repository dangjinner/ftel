<?php

namespace Modules\Affiliate\Http\Requests\Client;

use Modules\Core\Http\Requests\Request;

class CreateAffiliateLinkRequest extends Request
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
            'is_short_link' => 'nullable|boolean',
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
