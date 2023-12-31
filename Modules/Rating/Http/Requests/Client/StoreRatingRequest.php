<?php

namespace Modules\Rating\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review' => 'required|string',
            'rating' => 'required|int|in:1,2,3,4,5',
            'type' => 'required|int|in:1,2,3',
            'url' => 'required_if:type,1|string',
            'post_id' => 'required_if:type,2|int',
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
