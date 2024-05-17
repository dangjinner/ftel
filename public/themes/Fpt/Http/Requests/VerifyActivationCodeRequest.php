<?php

namespace Themes\Fpt\Http\Requests;

use Modules\Core\Http\Requests\Request;


class VerifyActivationCodeRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'activationCode' => 'required|string|exists:activations,code',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
        ];
    }
}

