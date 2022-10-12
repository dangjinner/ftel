<?php

namespace Modules\Post\Http\Controllers\Admin;

use Modules\Admin\Traits\HasCrudActions;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\SavePostRequest;
use Illuminate\Http\Request;
use Modules\Group\Entities\Group;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Page\Entities\Page;

class PostController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'post::posts.post';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'post::admin.posts';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SavePostRequest::class;

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function ajaxSlug()
    {
        $name = request()->get('name');
        $post_id = request()->get('post_id');

        $slug = str_slug($name) ?: slugify($name);

        if($post_id != 0)
        {
            $slug_current = $this->getModel()->where('id', $post_id)->first()->slug;
            if($slug_current == $slug)
            {
                return $slug_current;
            }
        }

        $query = $this->getModel()->where('slug', $slug)->withoutGlobalScope('active')->withTrashed();
        $queryPage = Page::where('slug', $slug)->withoutGlobalScope('active');

        if ($query->exists() || $queryPage->exists()) {
            $slug .= '-' . str_random(8);
        }

        return $slug;
    }

    // public function index(Request $request)
    // {
    //     if ($request->has('query')) {
    //         return $this->getModel()
    //             ->search($request->get('query'))
    //             ->query()
    //             ->limit($request->get('limit', 10))
    //             ->get();
    //     }

    //     if ($request->has('table')) {
    //         // dd($this->getModel()->with('groups')->table($request));
    //         return $this->getModel()->table($request);
    //     }

    //     return view("{$this->viewPath}.index");
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array_merge([
            'tabs' => TabManager::get($this->getModel()->getTable()),
            $this->getResourceName() => $this->getModel(),
            'groups'    => Group::treeList(),
        ], $this->getFormData('create'));

        return view("{$this->viewPath}.create", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->getEntity($id);
        $postCategories = $post->groups->pluck('id')->toArray();
        $data = array_merge([
            'tabs' => TabManager::get($this->getModel()->getTable()),
            $this->getResourceName() => $post,
            'groups'    => Group::treeList(),
            'postCategories'    => $postCategories
        ], $this->getFormData('edit', $id));

        return view("{$this->viewPath}.edit", $data);
    }

    public function updateDate(Request $request){
        $post = Post::findOrFail($request->get('post_id'));
        $timestamp = date("Y-m-d H:i:s", strtotime($request->get('stringBack')));
        $post->created_at = $timestamp;
        $post->save();
        return 'ok';
    }
}

