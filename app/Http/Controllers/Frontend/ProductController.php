<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function category($id, $slug){
        $category = ProductCategory::whereId($id)
            ->where('status', ProductCategory::STATUS_ACTIVE)
            ->first();
        if(!$category)
            abort(404);

        $categoryIds = [$category->id];


        $products = Product::where('products.status', Product::STATUS_ACTIVE)
            ->whereIn('category_id', $categoryIds)
            ->paginate(10);


        return view('frontend.product.category')
            ->with('category', $category)
            ->with('products', $products);
    }

    public function detail($slug, Request $request){
        $product = Product::whereSlug($slug)->first();
        if(!$product)
            abort(404);


        return view('frontend.product.detail')
            ->with('product', $product);
    }
}
