<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMetadata;
use Illuminate\Http\Request;

class ProductMetadataController extends Controller
{
    public function create($product_id){
        $product = Product::find($product_id);
        if(!$product){
            abort(404);
        }

        $productMetadatas = ProductMetadata::whereProductId($product_id)->get();

        return view('backend.product-metadata.create')
            ->with('product', $product)
            ->with('productMetadatas', $productMetadatas);
    }
}
