@extends('frontend.layouts.master')

@section('title')
    Dịch vụ của chúng tôi
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
    <div id="product-index" class="">
        <div class="section-top py-5">
            <div class="container">
                {{ Breadcrumbs::render('service') }}
                <h1 class="text-white">Dịch vụ</h1>
            </div>
        </div>
        <div class="section-content mt-5">

            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card product-card p-0">
                                <img src="{{ $product->thumb('small') }}" class="product-img card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h3 class="product-title">
                                        <a href="{{ $product->publicUrl() }}">{{ $product->name }}</a>
                                    </h3>
                                    <a href="{{ $product->publicUrl() }}" class="btn btn-detail btn-block"><i class="fal fa-chevron-circle-right"></i> Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{
                    $products->appends([])->links('vendor.pagination.frontend-bootstrap-4')
                }}
            </div>
        </div>

    </div>
@stop
