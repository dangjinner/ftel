<?php

namespace Themes\Fpt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    protected function prepareForValidation()
    {
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cf_name' => 'required|string',
            'cf_phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'cf_note' => 'nullable|string',
            'cf_address' => 'required|string',
            'cf_service' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'cf_name.required' => 'Vui lòng nhập họ và tên.',
            'cf_name.string' => 'Họ và tên không hợp lệ.',

            'cf_phone.required' => 'Vui lòng nhập số điện thoại.',
            'cf_phone.string' => 'Số điện thoại không hợp lệ.',
            'cf_phone.regex' => 'Số điện thoại chỉ được chứa số và ký tự (+, -, khoảng trắng).',
            'cf_phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',

            'cf_note.string' => 'Ghi chú không hợp lệ.',

            'cf_address.required' => 'Vui lòng nhập địa chỉ.',
            'cf_address.string' => 'Địa chỉ không hợp lệ.',

            'cf_service.required' => 'Vui lòng chọn dịch vụ.',
            'cf_service.exists' => 'Dịch vụ được chọn không tồn tại.',
        ];
    }

}
