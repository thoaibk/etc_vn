@extends('frontend.layouts.master')
@section('title', $product->name)

@section('styles')
    {!! Html::style(mix('assets/frontend/css/category.css')) !!}
@stop

@section('content')
    <div id="category-detail" class="bg-white pt-5">
        <div class="product-info">
            <div class="container">
                {{ Breadcrumbs::render('product-detail', $product) }}
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="detail-inner">
                            <h1 class="product-title">{{ $product->name }}</h1>
                            <div class="content-render">
                                {!! $product->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="related-product">
                            <h2 class="right-title mt-0 mb-4">Sản phẩm khác</h2>
                            <x-product-right :excludeId="$product->id"></x-product-right>
                        </div>
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
