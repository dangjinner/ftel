<?php

namespace Modules\Page\Http\Controllers\Admin;

use Modules\Page\Entities\Page;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Page\Http\Requests\SavePageRequest;
use Illuminate\Http\Request;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Core\Entities\Province;
use Modules\Group\Entities\Group;
use Modules\Post\Entities\Post;

class PageController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'page::pages.page';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'page::admin.pages';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SavePageRequest::class;

    public function ajaxSlug()
    {
        $name = request()->get('name');
        $page_id = request()->get('page_id');

        $slug = str_slug($name) ?: slugify($name);

        if($page_id != 0)
        {
            $slug_current = $this->getModel()->where('id', $page_id)->first()->slug;
            if($slug_current == $slug)
            {
                return $slug_current;
            }
        }

        $query = $this->getModel()->where('slug', $slug)->withoutGlobalScope('active');
        $queryPost =Post::where('slug', $slug)->withoutGlobalScope('active')->withTrashed();

        if ($query->exists() || $queryPost->exists()) {
            $slug .= '-' . str_random(8);
        }

        return $slug;
    }

    public function store(SavePageRequest $request) {
        $customs = [];
        if($request->has('custom')) {
           $request->merge([
            'custom' => json_encode($request->get('custom'))
           ]);
        }
        $this->disableSearchSyncing();

        $entity = $this->getModel()->create($request->all());

        $this->searchable($entity);

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo($entity);
        }

        return redirect()->route("{$this->getRoutePrefix()}.index")
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    }

    public function redirectPreview(Request $request){
        $request->session()->put('data', $request->get('data'));
        $request->session()->put('title', $request->get('title'));
        $request->session()->put('is_toc', $request->get('is_toc'));
        return 'ok';
    }

    public function postPreview(Request $request){
        $data = $request->session()->get('data');
        $title = $request->session()->get('title');
        $is_toc = $request->session()->get('is_toc');
        return view('public.pages.preview', compact('data', 'title', 'is_toc'))->withShortcodes();
    }

    public function create()
    {
        $data = array_merge([
            'tabs' => TabManager::get($this->getModel()->getTable()),
            $this->getResourceName() => $this->getModel(),
            'groups'    => Group::treeList(),
            'provinces' => Province::all()->pluck('name','id'),
        ], $this->getFormData('create'));

        return view("{$this->viewPath}.create", $data);
    }

    public function edit($id)
    {
        $page = $this->getEntity($id);
        $data = array_merge([
            'tabs' => TabManager::get($this->getModel()->getTable()),
            $this->getResourceName() => $page,
            'groups'    => Group::treeList(),
            'provinces' => Province::all()->pluck('name','id'),
        ], $this->getFormData('edit', $id));

        return view("{$this->viewPath}.edit", $data);
    }

    public function design()
    {
        return view('page::admin.pagebuilder.design');
    }

    public function designv2()
    {
        return view('page::admin.pagebuilder.design_v2');
    }

    public function designPost()
    {
        return 'ok';
    }

}
