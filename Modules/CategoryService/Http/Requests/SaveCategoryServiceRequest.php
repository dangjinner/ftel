<?php

namespace Modules\CategoryService\Http\Requests;

use Modules\Core\Http\Requests\Request;
use Illuminate\Validation\Rule;
use Modules\CategoryService\Entities\CategoryService;

class SaveCategoryServiceRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'categoryservice::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => $this->getSlugRules(),
            'is_default_rating' => 'required|boolean',
            'custom_avg_rating' => 'required_if:is_default_rating,0|numeric|min:1|max:5',
            'custom_rating_count' => 'required_if:is_default_rating,0|int|min:1',
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.category_services.update'
            ? ['required']
            : ['nullable'];

        $slug = CategoryService::withoutGlobalScope('active')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('category_services', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
