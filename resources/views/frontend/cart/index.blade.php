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
                    <div id="cartContentJs" class="cart-content bg-white">
                        @include('frontend.cart._cart_content')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="orderForm bg-white p-3">
                        <h3 style="font-size: 1.3em;">Thông tin đặt hàng</h3>
                        <hr class="m-0">
                        <br>
                        {!! Form::open([
                            'route' => ['cart.order']
                        ]) !!}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required value="{{ Request::old('name') }}" placeholder="Tên của bạn" aria-describedby="validationName">
                            @if($errors->has('name'))
                                <div id="validationName" class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input name="phone" type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ Request::old('phone') }}" required placeholder="Số điện thoại">
                            @if($errors->has('phone'))
                                <div id="validationName" class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ Request::old('email') }}" required placeholder="Email">
                            @if($errors->has('email'))
                                <div id="validationName" class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Địa chỉ giao hàng" rows="2">{{ Request::old('address') }}</textarea>
                            @if($errors->has('address'))
                                <div id="validationName" class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea name="note" class="form-control " placeholder="Ghi chú của bạn" rows="2">{{ Request::old('note') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-confirm-order btn" type="submit">Đặt hàng</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
