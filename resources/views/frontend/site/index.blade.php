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
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-image">
                                <a href="#">
                                    <img src="/image/sv/sp01.png" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="service-meta mt-2 text-center">
                                <h4 class="service-name"><a class="service-link" href="#">Cung cấp vật tư, thiết bị điện</a></h4>
                                <p>Cung cấp các loại vật tư về điện, thiết bị điện cho các công trình từ lớn đến nhỏ. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-image">
                                <a href="#">
                                    <img src="/image/sv/sp03.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="service-meta mt-2 text-center">
                                <h4 class="service-name"><a class="service-link" href="#">Thi công đường dây và trạm biến áp đến 220kV</a></h4>
                                <p>Cung cấp các loại vật tư về điện, thiết bị điện cho các công trình từ lớn đến nhỏ. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-image">
                                <a href="http://evismart.com.vn" target="_blank">
                                    <img src="/image/sv/evismart.png" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="service-meta mt-2 text-center">
                                <h4 class="service-name"><a class="service-link" href="http://evismart.com.vn" target="_blank">Sản xuất và cung cấp thiết bị smart home - Evismart</a></h4>
                                <p>Cung cấp các loại vật tư về điện, thiết bị điện cho các công trình từ lớn đến nhỏ. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-xs-12 col-sm-6 col-md-2"></div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-image">
                                <a href="#">
                                    <img src="/image/sv/sp04.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="service-meta mt-2 text-center">
                                <h4 class="service-name"><a class="service-link" href="#"> Thi công công trình dân dụng, hạ tầng kỹ thuật</a></h4>
                                <p>Cung cấp các loại vật tư về điện, thiết bị điện cho các công trình từ lớn đến nhỏ. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-image">
                                <a href="#">
                                    <img src="/image/sv/sp05.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="service-meta mt-2 text-center">
                                <h4 class="service-name"><a class="service-link" href="#">Thi công, chuyển giao hệ thống năng lượng tái tạo: Solar, điện gió</a></h4>
                                <p>Cung cấp các loại vật tư về điện, thiết bị điện cho các công trình từ lớn đến nhỏ. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <div id="section-news" class="bg-white pb-5">
        <div class="container">
            <h2 class="section-title">Tin tức - bài viết</h2>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="news-block">

                        <div class="img-box">
                            <a href="/news/duis-autem-vel-eum-iriure-0" hreflang="en">
                                <img src="/image/new2.png">
                            </a>
                            <div class="overlay">
                                <a data-fancybox="" href="/news/duis-autem-vel-eum-iriure-0" class="play-button"><i class="flaticon-unlink"></i></a>
                            </div>

                        </div>

                        <div class="news-text">
                            <div class="date"><time datetime="2019-03-25T12:00:00Z">25 Mar 2019</time>
                            </div>
                            <h3 class="news-title">
                                <a class="text-decoration-none" href="" >Thi công hệ thống điện tại khu công nghiệp Sóng Thần</a>
                            </h3>
                            <div class="description">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 news-block">
                    <div class="news-block">

                        <div class="img-box">
                            <a href="/news/duis-autem-vel-eum-iriure-0" hreflang="en">
                                <img src="/image/new1.png">
                            </a>


                            <div class="overlay">
                                <a data-fancybox="" href="/news/placerat-facer-possim-assum" class="play-button"><i class="flaticon-unlink"></i></a>
                            </div>

                        </div>

                        <div class="news-text">
                            <div class="date"><time datetime="2019-03-24T12:00:00Z">24 Mar 2019</time>
                            </div>
                            <h3 class="news-title">
                                <a class="text-decoration-none" href="" >An toàn thi công lưới điện tại evico</a>
                            </h3>
                            <div class="description">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum nibh euismod</div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 news-block">
                    <div class="news-block">

                        <div class="img-box">
                            <a href="/news/duis-autem-vel-eum-iriure-0" hreflang="en">
                                <img src="/image/32.jpg">
                            </a>


                            <div class="overlay">
                                <a data-fancybox="" href="/news/imperdiet-doming-id-quod-mazim" class="play-button"><i class="flaticon-unlink"></i></a>
                            </div>

                        </div>

                        <div class="news-text">
                            <div class="date"><time datetime="2019-03-23T12:00:00Z">23 Mar 2019</time>
                            </div>
                            <h3 class="news-title">
                                <a class="text-decoration-none" href="" >Evico hỗ trợ khách hàng 24/7</a>
                            </h3>
                            <div class="description">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script defer  src="/assets/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script>

        $(function () {
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            })
        })
    </script>
@stop


