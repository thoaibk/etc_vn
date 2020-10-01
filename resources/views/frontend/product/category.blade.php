@extends('frontend.layouts.master')

@section('title')
    {{ $category->name }}
@stop

@section('styles')
    {!! Html::style(mix('assets/frontend/css/product_detail.css')) !!}
    <style>
        body{
            background-color: #e6e8ed!important;
        }
    </style>
@stop

@section('content')
    <div id="product-category" class="">
        <div class="section-top py-5">
            <div class="bg-overlay">

            </div>
            <div class="container">
                {{ Breadcrumbs::render('category', $category) }}
                <h1 class="text-white">{{ $category->name }}</h1>
            </div>
        </div>
        <div class="section-content mt-5">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($products) > 0)
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-3 p-1">
                                        <a class="card product-card text-decoration-none text-dark" href="{{ $product->publicUrl() }}">
                                            <div class="product-thumb">
                                                <img class="img-fluid" src="{{ $product->thumb('medium') }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="mt-4 product-info text-center pt-3">
                                                <p class="price mb-0">{{ human_money($product->price) }}</p>
                                                <h2 class="product-name text-dark text-decoration-none">{{ $product->name }}</h2>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4 class="my-4">Không có sản phẩm nào trong danh mục</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
