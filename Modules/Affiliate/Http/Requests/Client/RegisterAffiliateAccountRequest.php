<?php

namespace Modules\Affiliate\Http\Requests\Client;

use Modules\Core\Http\Requests\Request;

class RegisterAffiliateAccountRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:affiliate_accounts,email',
            'phone_number' => ['required', 'regex:/(0[3|5|7|8|9])+([0-9]{8})\b/u'],
            'address' => 'required|string',
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
