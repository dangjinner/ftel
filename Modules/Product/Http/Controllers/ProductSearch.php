<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Attribute\Entities\Attribute;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Events\ShowingProductList;

trait ProductSearch
{
    /**
     * Search products for the request.
     *
     * @param \Modules\Product\Entities\Product $model
     * @param \Modules\Product\Filters\ProductFilter $productFilter
     * @return \Illuminate\Http\Response
     */
    public function searchProducts(Product $model, ProductFilter $productFilter)
    {
        $productIds = [];

        if (request()->filled('query')) {
            $model = $model->search(request('query'));
            $productIds = $model->keys();
        }

        $query = $model->filter($productFilter);

        if (request()->filled('category')) {
            $productIds = (clone $query)->select('products.id')->resetOrders()->pluck('id');
        }

        $products = $query->paginate(request('perPage', 30));

        event(new ShowingProductList($products));

        return response()->json([
            'products' => $products,
            'attributes' => $this->getAttributes($productIds),
        ]);
    }

    public function getSearchProducts(Product $model, ProductFilter $productFilter)
    {
        $productIds = [];

        if (request()->filled('query')) {
            $model = $model->search(request('query'));
            $productIds = $model->keys();
        }

        $query = $model->filter($productFilter);


        if (request()->filled('category')) {
            $productIds = (clone $query)->select('products.id')->resetOrders()->pluck('id');
        }

        // if (request()->filled('tag')) {
        //     $productIds = (clone $query)->select('products.id')->resetOrders()->pluck('id');
        // }

        $price_start = request()->price_start;

        $price_end = request()->price_end;

        if (request()->price_start || request()->price_end) {
            $query->whereBetween('selling_price', [$price_start, $price_end]);
        }

        $products = $query->with('attributes', 'reviews')->paginate(request('perPage', 12));


        event(new ShowingProductList($products));

        return $products;
    }

    private function getAttributes($productIds)
    {
        if (! request()->filled('category') || $this->filteringViaRootCategory()) {
            return collect();
        }

        return Attribute::with('values')
            ->where('is_filterable', true)
            ->whereHas('categories', function ($query) use ($productIds) {
                $query->whereIn('id', $this->getProductsCategoryIds($productIds));
            })
            ->get();
    }

    private function filteringViaRootCategory()
    {
        return Category::whereTranslation('name', request('category'))
            ->firstOrNew([])
            ->isRoot();
    }

    private function getProductsCategoryIds($productIds)
    {
        return DB::table('product_categories')
            ->whereIn('product_id', $productIds)
            ->distinct()
            ->pluck('category_id');
    }
}
