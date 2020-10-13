@extends('frontend.layouts.master')

@section('title')
    {{ $category->name }}
@stop

@section('styles')
    {!! Html::style(mix('assets/frontend/css/category.css')) !!}
    <style>
        body{
            background-color: #e6e8ed!important;
        }
    </style>
@stop

@section('content')
    <div id="product-category" class="">
        <div class="section-top py-5">
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
                                    <div class="col-md-4">
                                        <a class="card product-card text-decoration-none" href="{{ $product->publicUrl() }}">
                                            <div class="product-thumb">
                                                <img class="img-fluid" src="{{ $product->thumb('social') }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="mt-2 product-info pt-3">
                                                <h2 class="product-name text-decoration-none">{{ $product->name }}</h2>
                                                <p class="text-dark short-desc">{{ $product->short_desc }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            {{
                                $products->appends([])->links('vendor.pagination.frontend-bootstrap-4')
                            }}
                        @else
                            <h4 class="my-4">Không có dữ liệu nào trong lĩnh vực này</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
