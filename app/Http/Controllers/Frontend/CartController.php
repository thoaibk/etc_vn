<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request){

        $cartItems = \Cart::content();
//        echo "<pre>"; print_r($cartItems); echo "</pre>"; die;
        return view('frontend.cart.index')
            ->with('cartItems', $cartItems);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){

        $productId = $request->get('id');
        $product = Product::find($productId);
        if(!$product){
            abort(404);
        }

        $quantity = 1;
        $weight = 0;
        $options = [
            'thumb' => $product->thumb('small')
        ];
        \Cart::add($product->id, $product->name, $quantity, $product->price, $weight, $options);

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sảm phẩm vào giỏ hàng'
        ]);
    }

    /**
     * @return float|int
     */
    public function count(){
        $count = \Cart::count();
        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }
}
