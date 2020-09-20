@extends('frontend.layouts.master')
@section('title')
    Đặt hàng thành công
@stop

@section('styles')
    {!! Html::style(mix('assets/frontend/css/cart_index.css')) !!}
@stop

@section('content')
    <div id="order-success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="order-wrapper mt-5">
                        <div class="order-head text-center">
                            <div class="">
                                <i class="fa-3x fal fa-check-circle"></i>
                            </div>
                            <h3>Đặt hàng thành công</h3>
                            <p> <i>Bạn đã đặt hàng thành công, chúng tôi sẽ xử lý đơn hàng trong thời gian sớm nhất</i></p>
                        </div>

                        <div class="order-infor mt-5">
                            <h5 class="text-uppercase text-secondary">Thông tin đặt hàng</h5>
                            <p class="mb-0"><span class="text-secondary">Tên: </span> <strong>{{ $order->name }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Điện thoại: </span> <strong>{{ $order->phone }}</strong> - <span class="text-secondary">Email: </span> <strong>{{ $order->email }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Địa chỉ giao hàng: </span> <strong>{{ $order->address }}</strong></p>
                            @if(!empty($order->note))
                                <p><i>Ghi chú: {{ $order->note }}</i></p>
                            @endif
                        </div>

                        <div class="cart-content mt-4">
                            <h5 class="text-uppercase text-secondary">Sản phẩm đã đặt </h5>
                            @foreach($order->order_items as $orderItem)
                                @php ($item = $orderItem->item())
                                @if($item)
                                <div class="cart-products__product">
                                    <div class="cart-products__inner">
                                        <div class="cart-products__img">
                                            <a href="">
                                                <img class="img-fluid" src="{{ $item->thumb('small') }}" alt="">
                                            </a>
                                        </div>

                                        <div class="cart-products__content">
                                            <div class="cart-products__content--inner">
                                                <div class="cart-products__desc">
                                                    <a class="cart-products__name" target="_blank" href="{{ $item->publicUrl() }}">{{ $item->name }}</a>
                                                </div>
                                                <div class="cart-products__details">
                                                    <div class="cart-products__qty mr-4">
                                                        <span class="text-secondary">Số lượng: </span> <strong>{{ $orderItem->qty }}</strong>
                                                    </div>
                                                    <div class="cart-products__pricess">
                                                        <p class="cart-products__real-prices">{{ human_money($orderItem->total()) }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="cart-content mt-4">
                            <h5 class="text-uppercase text-secondary">Giá trị đơn hàng</h5>
                            <p style="font-size: 1.5em;">{{ human_money($order->amount()) }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
