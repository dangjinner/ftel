<?php

namespace Modules\Group\Entities;

use TypiCMS\NestableTrait;
use Modules\Support\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Modules\Support\Eloquent\Sluggable;
use Modules\Support\Eloquent\Translatable;
use Modules\Post\Entities\Post;
use Modules\Media\Entities\File;
use Modules\Media\Eloquent\HasMedia;
use Modules\Meta\Eloquent\HasMetaData;

class Group extends Model {

    use Translatable, Sluggable, NestableTrait, HasMedia, HasMetaData;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'slug', 'position', 'is_searchable', 'is_active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_searchable' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name', 'intro'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addActiveGlobalScope();
    }

    public static function findBySlug($slug)
    {
        return static::with('files')->where('slug', $slug)->firstOrNew([]);
    }


    public function isRoot()
    {
        return $this->exists && is_null($this->parent_id);
    }

    public function parent()
    {
        return $this->belongsTo(Group::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Group::class, 'parent_id', 'id');
    }

    public function childrenRecursive()
    {
    return $this->children()->with('childrenRecursive');
    }

    public function url()
    {
        return route('group.groups.index', ['group' => $this->slug]);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_groups');
    }

    public static function treeList()
    {
        return Cache::tags('groups')->rememberForever(md5('groups.tree_list:' . locale()), function () {
            return static::orderByRaw('-position DESC')
                ->get()
                ->nest()
                ->setIndent('¦–– ')
                ->listsFlattened('name');
        });
    }

    public function getLogoAttribute()
    {
        return $this->files->where('pivot.zone', 'logo')->first() ?: new File;
    }

    public function getBannerAttribute()
    {
        return $this->files->where('pivot.zone', 'banner')->first() ?: new File;
    }


    public function toArray()
    {
        $attributes = parent::toArray();

        if ($this->relationLoaded('files')) {
            $attributes += [
                'logo' => [
                    'id' => $this->logo->id,
                    'path' => $this->logo->path,
                    'exists' => $this->logo->exists,
                ],
                'banner' => [
                    'id' => $this->banner->id,
                    'path' => $this->banner->path,
                    'exists' => $this->banner->exists,
                ],
            ];
        }

        return $attributes;
    }

    // public static function searchable()
    // {
    //     return Cache::tags('groups')
    //         ->rememberForever(md5('groups.searchable:' . locale()), function () {
    //             return static::where('is_searchable', true)
    //                 ->get()
    //                 ->map(function ($group) {
    //                     return [
    //                         'slug' => $group->slug,
    //                         'name' => $group->name,
    //                     ];
    //                 });
    //         });
    // }

    // public function groups()
    // {
    //     return $this->belongsToMany(Post::class, 'post_groups');
    // }


}
