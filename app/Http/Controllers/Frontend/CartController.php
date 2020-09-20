<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public $cartInstance = 'shopping';

    public function index(Request $request){

        $cartItems = $this->_getCartContent();

        return view('frontend.cart.index')
            ->with('cartItems', $cartItems);
    }

    protected function _getCartContent(){
        $cartItems = \Cart::instance($this->cartInstance)->content();
        return $cartItems;
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
        \Cart::instance($this->cartInstance)->add($product->id, $product->name, $quantity, $product->price, $weight, $options);

        $cartItems = $this->_getCartContent();
        $cart_content_html = view('frontend.cart._cart_content', compact('cartItems'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sảm phẩm vào giỏ hàng',
            'cart_content_html' => $cart_content_html
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function updateQuantity(Request $request){
        $cart_row_id = $request->get('rowId');
        $action = $request->get('action');

        if(!in_array($action, ['decrement', 'increment'])){
            response('Thao tác không hợp lệ', 401);
        }

        try{
            $cartItem = \Cart::instance($this->cartInstance)->get($cart_row_id);
            if(!$cartItem){
                response('Không tìm thấy sản phẩm trong giỏ hàng', 401);
            }

            $curent_quantity = $cartItem->qty;
            // giảm
            if($action == 'decrement'){
                if($curent_quantity == 1){
                    \Cart::instance($this->cartInstance)->remove($cart_row_id);
                } else{
                    $cartItem->setQuantity($curent_quantity - 1);
                }

            } else if($action == 'increment'){
                $cartItem->setQuantity($curent_quantity + 1);
            }

            $cartItems = $this->_getCartContent();
            $cart_content_html = view('frontend.cart._cart_content', compact('cartItems'))->render();
            $cart_count = \Cart::instance($this->cartInstance)->count();

            return response()->json([
                'success' => true,
                'cart_content_html' => $cart_content_html,
                'cart_count' => $cart_count
            ]);

        } catch (\Exception $exception){
            return response('Lỗi: ' . $exception->getMessage(), 401);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function remove(Request $request)
    {
        $cart_row_id = $request->get('rowId');
        try{
            // Xóa
            \Cart::remove($cart_row_id);

            $cartItems = $this->_getCartContent();
            $cart_content_html = view('frontend.cart._cart_content', compact('cartItems'))->render();

            return response()->json([
                'success' => true,
                'cart_content_html' => $cart_content_html,
            ]);

        } catch (\Exception $exception){
            return response('Lỗi: ' . $exception->getMessage(), 401);
        }
    }

    /**
     * @return float|int
     */
    public function count(){
        $count = \Cart::instance($this->cartInstance)->count();
        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }


    public function order(Request $request){
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'email.required' => 'Bạn chưa nhập email',
            'address.required' => 'Bạn chưa nhập địa chỉ giao hàng',
        ]);

        if(!$validator->passes()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $cartItems = $this->_getCartContent();
        if(count($cartItems) == 0){
            return redirect()->back()->withFlashDanger('Bạn không có sản phẩm nào trong giỏ hàng');
        }

        \DB::beginTransaction();
        try{
            $order = Order::create([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'address' => $request->get('address'),
                'note' => $request->get('note'),
                'hash' => md5(base64_encode(time() . 'you are stupid. ;)'))
            ]);

            foreach ($cartItems as $cartItem){
                $product = Product::find($cartItem->id);
                if($product){
                    $order->order_items()->create([
                        'item_id' => $product->id,
                        'item_type' => $product->getMorphClass(),
                        'qty' => $cartItem->qty,
                        'price' => $cartItem->price
                    ]);
                }
            }

            \Cart::instance($this->cartInstance)->destroy();

            \DB::commit();

            return redirect($order->hashUrl())->withFlashSuccess('Bạn đã đặt hàng thành công');

        } catch (\Exception $exception){
            \DB::rollBack();
            return redirect()->back()->withFlashDanger($exception->getMessage());
        }

    }

    /**
     * @param $hash
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orderSuccess($hash){
        $order = Order::whereHash($hash)->first();
        if(!$order)
            abort(404);

        return view('frontend.cart.order-success')
            ->with('order', $order);
    }
}
