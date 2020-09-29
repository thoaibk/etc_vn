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

        $productMetadata = ProductMetadata::whereProductId($product_id)
            ->get()
            ->mapWithKeys(function ($item){
                return [$item->key => $item->value];
            })
            ->toArray();

        return view('backend.product.metadata')
            ->with('product', $product)
            ->with('productMetadata', $productMetadata);
    }


    public function store($product_id, Request $request){

        $product = Product::find($product_id);
        if(!$product){
            abort(404);
        }

        try{
            $productMetas = config('product.metadata');
            foreach ($productMetas as $productMeta){
                if($request->has($productMeta['key'])){
                    $product->metadatas()->updateOrCreate([
                        'key' => $productMeta['key']
                    ], [
                        'value' => $request->get($productMeta['key'])
                    ]);
                }
            }
            return redirect(route('backend.product.metadata', ['product_id' => $product->id]))->withFlashSuccess('Đã lưu thuộc tính');
        } catch (\Exception $exception){
            return redirect()->back()->withFlashDanger($exception->getMessage());
        }
    }
}
