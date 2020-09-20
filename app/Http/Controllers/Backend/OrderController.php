<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BackendController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $orders = Order::query()->paginate(15);

        return view('backend.order.index')
            ->with('orders', $orders);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id){
        $order = Order::find($id);
        if(!$order)
            abort(404);

        return view('backend.order.view')
            ->with('order', $order);
    }
}
