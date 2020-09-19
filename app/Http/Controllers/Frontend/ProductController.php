<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function detail($slug, Request $request){
        $product = Product::whereSlug($slug)->first();
        if(!$product)
            abort(404);


        return view('frontend.product.detail')
            ->with('product', $product);
    }
}
