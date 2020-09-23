@extends('frontend.layouts.master')
@section('title')
    {{ $category->name }}
@stop

@section('content')
    <div id="product-category">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <a class="card product-card" href="{{ $product->publicUrl() }}">
                                    <div class="product-thumb">
                                        <img class="img-fluid" src="{{ $product->thumb('medium') }}" alt="{{ $product->name }}">
                                    </div>
                                    <h2>{{ $product->name }}</h2>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
