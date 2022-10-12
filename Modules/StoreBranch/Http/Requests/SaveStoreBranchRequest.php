<?php

namespace Modules\StoreBranch\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveStoreBranchRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'storebranch::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'hotline_sales' => ['required'],
            'switchboard_cskh' => ['required'],
        ];
    }
}
