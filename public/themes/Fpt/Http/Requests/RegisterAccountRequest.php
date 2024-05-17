<?php

namespace Themes\Fpt\Http\Requests;

use Modules\Core\Http\Requests\Request;


class RegisterAccountRequest extends Request
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
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'regex:/(0[3|5|7|8|9])+([0-9]{8})\b/u', 'unique:users,phone_number'],
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
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
            'phone.required' => 'Vui lòng nhập SĐT',
            'phone.unique' => 'SĐT đã được đăng ký',
            'phone.regex' => 'Vui lòng nhập đúng SĐT',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'confirm_password.required' => 'Vui lòng nhập mật khẩu',
            'confirm_password.same' => 'Xác nhận mật khẩu không chính xác',
        ];
    }
}

