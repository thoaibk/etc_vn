<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMetadata;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function category($slug){
        $category = ProductCategory::whereSlug($slug)
            ->where('status', ProductCategory::STATUS_ACTIVE)
            ->first();
        if(!$category)
            abort(404);

        \SEOMeta::setTitle($category->name);
        \OpenGraph::setTitle($category->name);
        \OpenGraph::addImage($category->thumb('social'),['height' => 600, 'width' => 315]);

        $categoryIds = [$category->id];


        $products = Product::where('products.status', Product::STATUS_ACTIVE)
            ->whereIn('category_id', $categoryIds)
            ->paginate(9);

        return view('frontend.product.category')
            ->with('category', $category)
            ->with('products', $products);
    }

    public function detail($slug, Request $request){
        $product = Product::whereSlug($slug)->first();
        if(!$product)
            abort(404);


        \SEOMeta::setTitle($product->getTitle());
        \SEOMeta::setDescription($product->getDescription());
        \SEOMeta::setKeywords($product->getKeywords());

        \OpenGraph::setTitle($product->getTitle());
        \OpenGraph::setDescription($product->getDescription());
        \OpenGraph::addImage($product->thumb('social'),['height' => 600, 'width' => 315]);


        $productMetadata = ProductMetadata::whereProductId($product->id)
            ->get()
            ->mapWithKeys(function ($item){
                return [$item->key => $item->value];
            })
            ->toArray();
        return view('frontend.product.detail')
            ->with('product', $product)
            ->with('productMetadata', $productMetadata);
    }
}
