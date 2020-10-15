@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
@stop

@section('content')

    <x-banner></x-banner>

    <div id="out-services" class="bg-white">
        <div class="container">
            <h2 class="section-title">Sản phẩm và dịch vụ</h2>

            <x-category1></x-category1>
            <x-category2></x-category2>
        </div>
    </div>

    <div id="section-image-collection" class="py-5">
        <div class="container">
            <h2 class="section-title">Thư viện ảnh</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/01.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/02.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/03.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/04.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/05.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-item">
                        <div class="thumb">
                            <img src="/image/garary/06.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-index-post></x-index-post>

    <div id="section-partner" class="bg-white py-5">
        <div class="container">
            <h2 class="section-title">Đối tác</h2>
            <div class="d-flex">
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/05.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/03.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/04.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/fpt.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/02.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/06.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partnet/07.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
@stop

@section('script-after')

@stop


