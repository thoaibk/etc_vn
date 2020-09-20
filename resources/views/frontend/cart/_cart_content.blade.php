@if(count($cartItems) > 0)
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
                                <button class="btn btn-remove-from-cart btn-outline-secondary" onclick="removeCartItem('{{ $cartItem->rowId }}')">Xóa</button>
                            </div>
                        </div>
                        <div class="cart-products__details">
                            <div class="cart-products__pricess">
                                <p class="cart-products__real-prices">{{ human_money($cartItem->total) }}</p>
                            </div>
                            <div class="cart-products__qty">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text pointer" onclick="updateCartQuantity('decrement', '{{ $cartItem->rowId }}')" title="Giảm số lượng">-</span>
                                    </div>
                                    <div class="input-group-prepend item-quantity">
                                        <span class="input-group-text quan bg-white">{{ $cartItem->qty }}</span>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text pointer" onclick="updateCartQuantity('increment', '{{ $cartItem->rowId }}')" title="Tăng số lượng">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="p-3">
        <p><i>Không có sản phẩm nào trong giỏ hàng của bạn</i></p>
    </div>
@endif

