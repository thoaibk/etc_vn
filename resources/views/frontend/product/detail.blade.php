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
                                <h2>Thông số kỹ thuật</h2>
                                <ul class="parameter ">
                                    <li class="p210653 g6459_79_77">
                                        <span>Màn hình:</span>
                                        <div><a href="" target="_blank">OLED</a>, 6.5", <a href="" target="_blank">Super Retina XDR</a></div></li>
                                    <li class="p210653 g72"><span>Hệ điều hành:</span><div><a href="" >iOS 13</a></div></li>
                                    <li class="p210653 g27"><span>Camera sau:</span><div>3 camera 12 MP</div></li>
                                    <li class="p210653 g29"><span>Camera trước:</span><div>12 MP</div></li>
                                    <li class="p210653 g6059"><span>CPU:</span><div><a href="" target="_blank">Apple A13 Bionic 6 nhân</a></div></li>
                                    <li class="p210653 g50"><span>RAM:</span><div>4 GB</div></li>
                                    <li class="p210653 g49"><span>Bộ nhớ trong:</span><div>256 GB</div></li>
                                    <li class="g6339_6463">
                                        <span>Thẻ SIM:</span>
                                        <div class="isim"><a href="" target="_blank">1 eSIM &amp; 1 Nano SIM</a>, <a href="" target="_blank">Hỗ trợ 4G</a></div>
                                        <div class="ibsim"><b class="h">HOT</b><a href="">SIM VNMB Siêu sim (5GB/ngày)</a></div>
                                    </li>
                                    <li class="p210653 g84_10882">
                                        <span>Dung lượng pin:</span>
                                        <div>3969 mAh, có sạc nhanh</div>
                                    </li>
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
                        <a class="btn btn-info" href=""><i class="fa fa-shopping-cart"></i> Đi đến giỏ hàng</a>
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
            slidesToShow: slide > 5 ? 5 : (slide - 1 >0 ? slide - 1 : 1),
            slidesToScroll: 1,
            speed: 500,
            arrows: false,
            fade: false,
            asNavFor: '.slide-content',
            focusOnSelect: true

        });
    </script>
@stop
