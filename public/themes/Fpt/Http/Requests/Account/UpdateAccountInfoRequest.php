<?php

namespace Themes\Fpt\Http\Requests\Account;

use Modules\Core\Http\Requests\Request;


class UpdateAccountInfoRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_number' => ['required', 'regex:/(0[3|5|7|8|9])+([0-9]{8})\b/u', 'unique:users,phone_number'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
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
            'first_name.required' => 'Vui lòng nhập tên',
            'last_name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã được đăng ký',
            'phone_number.required' => 'Vui lòng nhập SĐT',
            'phone_number.unique' => 'SĐT đã được đăng ký',
            'phone_number.regex' => 'Vui lòng nhập đúng SĐT',
        ];
    }
}

