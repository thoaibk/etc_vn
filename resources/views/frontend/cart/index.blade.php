@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng của bạn')

@section('styles')
    {!! Html::style(mix('assets/frontend/css/cart_index.css')) !!}
@stop

@section('content')
    <div id="cart-index">
        <div class="container mt-3">
            {{ Breadcrumbs::render('cart') }}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart-content">
                        @foreach($cartItems as $cartItem)
                            <div class="cart-products__product">
                                <div class="cart-products__inner">
                                    <div class="cart-products__img">
                                        <a href="">
                                            @if($cartItem->options->has('thumb'))
                                                <img class="img-fluid" src="{{ $cartItem->options->thumb }}" alt="">
                                            @else
                                                <img class="img-fluid" src="/assets/img/no-image.jpg" alt="">
                                            @endif
                                        </a>
                                    </div>

                                    <div class="cart-products__content">
                                        <div class="cart-products__content--inner">
                                            <div class="cart-products__desc">
                                                <a class="cart-products__name" href="">{{ $cartItem->name }}</a>
                                                <div class="clearfix">
                                                    <button class="btn btn-remove-from-cart btn-outline-secondary">Xóa</button>
                                                </div>
                                            </div>
                                            <div class="cart-products__details">
                                                <div class="cart-products__pricess">
                                                    <p class="cart-products__real-prices">1.469.000đ</p>
                                                </div>
                                                <div class="cart-products__qty">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text pointer" onclick="Cart.updateItemQuantity('decrement', '5c34cb8bd882bb23fa14386029a25947')" title="Giảm số lượng">-</span>
                                                        </div>
                                                        <div class="input-group-prepend item-quantity">
                                                            <span class="input-group-text quan bg-white">1</span>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text pointer" onclick="Cart.updateItemQuantity('increment', '5c34cb8bd882bb23fa14386029a25947')" title="Tăng số lượng">+</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@stop
