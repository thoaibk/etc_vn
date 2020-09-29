@extends('frontend.layouts.master')
@section('title', $product->name)

@section('styles')
    {!! Html::style('/assets/plugins/slick-1.8.1/slick/slick.css') !!}
    {!! Html::style(mix('assets/frontend/css/product_detail.css')) !!}
@stop

@section('content')
    <div id="product-detail" class="bg-white pt-5">
        <div class="product-info">
            <div class="container">
                {{ Breadcrumbs::render('product-detail', $product) }}
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="product-slide">
                            <div class="slide-content">
                                @foreach($product->images as $image)
                                    <div class="img-slide">
                                        <img class="img-fluid" src="{{ $image->getImageSrc('slider') }}"/>
                                    </div>
                                @endforeach
                            </div>

                            <div class="slider-nav">
                                @foreach($product->images as $image)
                                    <div class="img-slide-nav active">
                                        <img class="img-fluid" src="{{ $image->getImageSrc('small') }}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product-attr">
                            <h1 class="product-title">{{ $product->name }}</h1>
                            <div class="price">
                                <span class="text-secondary" >Giá</span> : <span class="sale-price">{{ human_money($product->price) }}</span>
                            </div>
                            <button class="btn btn-add-to-card text-white" onclick="addToCart('{{ $product->id }}')">
                                <span class="text-uppercase"><i class="fa fa-cart-plus"></i> Đặt mua ngay</span>
                                <p class="btn-sub-text">Giao hàng tận nhà</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-product-content">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <h2>Mô tả chi tiết </h2>
                        <div class="product-content">
                            {!! $product->content !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-product">
                            <div class="tableparameter">
                                <h2>Thông số chi tiết</h2>
                                <ul class="parameter ">
                                    @foreach(config('product.metadata') as $meta)
                                        <li class="">
                                            <span>{{ $meta['name'] }}</span>
                                            <div>{{ isset($productMetadata[$meta['key']]) ? $productMetadata[$meta['key']] : '' }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cartSuccessModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Đặt hàng thành công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn đã đặt hàng thành công sản phẩm <strong>Cảm biến vân tay</strong></p>
                    <div class="text-center">
                        <a class="btn btn-info" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Đi đến giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script-after')
    {!! Html::script('/assets/plugins/slick-1.8.1/slick/slick.min.js') !!}

    <script>
        $('.slide-content').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            arrows: true,
            fade: false,
            asNavFor: '.slider-nav'

        });

        var slide = $('.img-slide-nav').length;
        $('.slider-nav').slick({
            slidesToShow: slide > 5 ? 5 : slide - 1 > 0 ? slide - 1 : 1,
            // infinite: false,
            slidesToScroll: 1,
            // variableWidth: false,
            speed: 500,
            arrows: false,
            fade: false,
            asNavFor: '.slide-content',
            focusOnSelect: true
        });
    </script>
@stop
