<?php

namespace Themes\Fpt\Http\Controllers;
use Modules\Group\Entities\Group;
use Modules\Slider\Entities\Slider;
use Modules\Menu\Entities\Menu;
use SEO;
use SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Brand\Entities\Brand;
use Modules\Product\Filters\ProductFilter;
use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\ProductSearch;
use Illuminate\Support\Collection;
use Modules\Product\RecentlyViewed;
use Modules\Product\Events\ProductViewed;

class ProductController
{
    use ProductSearch;

    public function productList(Product $model, ProductFilter $productFilter, Request $request)
    {
        if(! $request->get('sort') ){
            $request['sort'] = 'latest';
        }
        $products = $this->getSearchProducts($model, $productFilter);
        $categories = Category::where('is_searchable', true)->get();
        $brands = Brand::all();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ];

        return view('public.product.list', $data);
    }

    public function shop()
    {
        $products = Product::with('reviews', 'tags')->orderByDesc('id')->get();

        $posts = Post::desc()->limit(8)->get();
        $data = [
            'products' => $products,
            'posts' => $posts
        ];

        return view('public.product.shop', $data);
    }

    public function singleProduct($slug, RecentlyViewed $recent)
    {

        $product = Product::findBySlug($slug);
        // dd($product->relatedProducts);
        $categories = Category::where('is_searchable', true)->get();
        $brands = Brand::all();
        $price_max = Product::max('selling_price');
        $product_recent = $recent->products();


        $category = $product->categories->nest()->pluck('id')->toArray();
        $product_related = Product::whereHas('categories', function($query) use ($category){
            return $query->whereIn('id', $category);
        })
        // ->where('id', '!=', $product->id)
        ->get();
        // dd($product_related);
        SEO::setTitle($product->meta->meta_title ?? $product->name);
        SEO::setDescription($product->meta->meta_description ?? subwords(strip_tags($product->description), 100));
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::jsonLd()->addImage($product->base_image->path);
        SEO::twitter()->setSite(route('home'));
        OpenGraph::addImage($product->base_image->path);


        $data = [
            'product' => $product,
            'categories' => $categories,
            'categoryBreadcrumb' => $this->getCategoryBreadCrumb($product->categories->nest()),
            'brands' => $brands,
            'price_max' => $price_max,
            'product_recent' => $product_recent,
            'product_related' => $product_related
        ];
        event(new ProductViewed($product));
        return view('public.product.single', $data);
    }

    private function getCategoryBreadCrumb(Collection $categories)
    {
        $breadcrumb = '';

        foreach ($categories as $category) {
            $breadcrumb .= "<li><a href='{$category->url()}'>{$category->name}</a></li>";

            if ($category->items->isNotEmpty()) {
                $breadcrumb .= $this->getCategoryBreadCrumb($category->items);
            }
        }

        return $breadcrumb;
    }
}

