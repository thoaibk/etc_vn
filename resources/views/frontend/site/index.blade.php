@extends('frontend.layouts.master')

@section('styles')

@stop

@section('content')

    <x-banner></x-banner>

    <div class="container">
        <div>
            <div class="my-4 text-center ">
                <h2 class="section-title text-uppercase">Sản phẩm nổi bật</h2>
            </div>
        </div>
        <div class="row">
            @foreach($hotProducts as $hotProduct)
                <div class="col-md-4 p-1">
                    <div class="hot-priduct-wrapper">
                        <a href="{{ $hotProduct->publicUrl() }}">
                            <div class="hot-product-inner">
                                <img class="thumb" src="{{ $hotProduct->thumb('medium') }}" alt="">
                                <div class="inner-content">
                                    <h4 class="inner-text text-white text-uppercase">{{ $hotProduct->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div id="lastet-post">
        <div class="container">
            <div class="mt-5">
                <div class="my-4 text-center">
                    <h2 class="section-title text-uppercase">Bài viết - Tin tức</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 px-1">
                    <x-index-post />
                </div>
            </div>

        </div>
    </div>
@stop

@section('script-after')

@stop


