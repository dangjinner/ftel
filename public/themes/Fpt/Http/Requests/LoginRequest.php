<?php

namespace Themes\Fpt\Http\Requests;

use Modules\Core\Http\Requests\Request;


class LoginRequest extends Request
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
            'password' => 'required|string',
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
            'email.exists' => 'Không tồn tại tài khoản này',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
    }
}

