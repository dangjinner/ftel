<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Post\Entities\Post;
use Modules\Core\Http\Requests\Request;

class SavePostRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'post::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'          => ['required'],
            'slug'          => $this->getSlugRules(),
            'is_default_rating' => 'required|boolean',
            'custom_avg_rating' => 'required_if:is_default_rating,0|numeric|min:1|max:5',
            'custom_rating_count' => 'required_if:is_default_rating,0|int|min:1',
            // 'content'       => ['required']
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.posts.update'
        ? ['required']
        : ['nullable'];

        $slug = Post::withoutGlobalScope('active')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('posts', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
