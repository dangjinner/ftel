<?php

namespace Themes\Fpt\Http\Requests;

use Modules\Core\Http\Requests\Request;


class RegisterServiceRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => ['required'],
            'phone'             => ['required', 'regex:/(0[3|5|7|8|9])+([0-9]{8})\b/u'],
            'address'             => ['required'],
            // 'options_service'   => ['required'],
            // 'recaptcha_action' => ['required', 'string'],
            // 'recaptcha_token'  => ['required', 'string'],
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
            'name.required'                 => 'Vui lòng nhập tên',
            'phone.required'                => 'Vui lòng nhập SĐT',
            'phone.regex'                   => 'Vui lòng nhập đúng SĐT',
            'address.required'                   => 'Vui lòng nhập địa chỉ',
            'options_service.required'      => 'Vui lòng chọn dịch vụ'
        ];
    }
}

