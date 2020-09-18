@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
@stop

@section('content')
    @include('frontend.site._carousel')

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
{{--                                    <p class="inner-text text-white"> Temperature & humidity monitoring</p>--}}
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
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="latest-post-item">
                                <div class="latest-post-item-inner">
                                    <div class="latest-post-image">
                                        <img src="https://sonoff.tech/wp-content/uploads/2020/05/SONOFF-Pairing-Indicators-500x353.gif" class="attachment-ciyashop-latest-post-thumbnail size-ciyashop-latest-post-thumbnail wp-post-image" alt="MINI pulse mode">
                                    </div>
                                    <div class="latest-post-content">
                                        <div class="post-date">
                                            <div class="post-date-inner"> 14<span>Aug</span></div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="https://sonoff.tech/news/what-are-new-trigger-modes-for-minis-external-switch-pulse-mode">Apple ra mắt Ipad và Apple Watch mới</a>
                                        </h3>
                                        <div class="latest-post-meta">
                                            <ul class="d-flex meta-ul">
                                                <li class="mr-3">
                                                    <a href="#">
                                                        <i class="fa fa-user"></i> admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-folder-open"></i>
                                                    <a href="#" rel="category tag">Smart Home News</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="latest-post-excerpt">
                                            <p>Apple ra mắt Ipad và Apple Watch hoàn toàn mới vào ngày 15/9 tại trụ sở của hãng</p>
                                        </div>
                                        <div class="latest-post-entry-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="latest-post-item">
                                <div class="latest-post-item-inner">
                                    <div class="latest-post-image">
                                        <img src="https://sonoff.tech/wp-content/uploads/2020/08/2121-500x375.gif" class="attachment-ciyashop-latest-post-thumbnail size-ciyashop-latest-post-thumbnail wp-post-image" alt="MINI pulse mode">
                                    </div>
                                    <div class="latest-post-content">
                                        <div class="post-date">
                                            <div class="post-date-inner"> 14<span>Aug</span></div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="">Cách setup thiết bị điều khiển ánh sáng cơ bản</a>
                                        </h3>
                                        <div class="latest-post-meta">
                                            <ul class="d-flex meta-ul">
                                                <li class="mr-3">
                                                    <a href="#">
                                                        <i class="fa fa-user"></i> admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-folder-open"></i>
                                                    <a href="#" rel="category tag">Smart Home News</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="latest-post-excerpt">
                                            <p>Cách setup thiết bị điều khiển ánh sáng cơ bản cho người mới, cài đặt bộ điều khiển và app trên điện thoại</p>
                                        </div>
                                        <div class="latest-post-entry-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="latest-post-item">
                                <div class="latest-post-item-inner">
                                    <div class="latest-post-image">
                                        <img src="https://sonoff.tech/wp-content/uploads/2020/05/SONOFF-Pairing-Indicators-500x353.gif" class="attachment-ciyashop-latest-post-thumbnail size-ciyashop-latest-post-thumbnail wp-post-image" alt="MINI pulse mode">
                                    </div>
                                    <div class="latest-post-content">
                                        <div class="post-date">
                                            <div class="post-date-inner"> 14<span>Aug</span></div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="https://sonoff.tech/news/what-are-new-trigger-modes-for-minis-external-switch-pulse-mode">What are new trigger modes for MINI’s external switch?- Pulse Mode</a>
                                        </h3>
                                        <div class="latest-post-meta">
                                            <ul class="d-flex meta-ul">
                                                <li class="mr-3">
                                                    <a href="#">
                                                        <i class="fa fa-user"></i> admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-folder-open"></i>
                                                    <a href="#" rel="category tag">Smart Home News</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="latest-post-excerpt">
                                            <p>A few days before, SONOFF made the edge mode&nbsp;of MINI two-way smart...</p>
                                        </div>
                                        <div class="latest-post-entry-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="latest-post-item">
                                <div class="latest-post-item-inner">
                                    <div class="latest-post-image">
                                        <img src="https://sonoff.tech/wp-content/uploads/2020/08/%E4%BF%AE%E6%94%B9-500x375.gif" class="attachment-ciyashop-latest-post-thumbnail size-ciyashop-latest-post-thumbnail wp-post-image" alt="MINI pulse mode">
                                    </div>
                                    <div class="latest-post-content">
                                        <div class="post-date">
                                            <div class="post-date-inner"> 14<span>Aug</span></div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="https://sonoff.tech/news/what-are-new-trigger-modes-for-minis-external-switch-pulse-mode">What are new trigger modes for MINI’s external switch?- Pulse Mode</a>
                                        </h3>
                                        <div class="latest-post-meta">
                                            <ul class="d-flex meta-ul">
                                                <li class="mr-3">
                                                    <a href="#">
                                                        <i class="fa fa-user"></i> admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-folder-open"></i>
                                                    <a href="#" rel="category tag">Smart Home News</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="latest-post-excerpt">
                                            <p>A few days before, SONOFF made the edge mode&nbsp;of MINI two-way smart...</p>
                                        </div>
                                        <div class="latest-post-entry-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="latest-post-item">
                                <div class="latest-post-item-inner">
                                    <div class="latest-post-image">
                                        <img src="https://sonoff.tech/wp-content/uploads/2020/08/2121-500x375.gif" class="attachment-ciyashop-latest-post-thumbnail size-ciyashop-latest-post-thumbnail wp-post-image" alt="MINI pulse mode">
                                    </div>
                                    <div class="latest-post-content">
                                        <div class="post-date">
                                            <div class="post-date-inner"> 14<span>Aug</span></div>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="https://sonoff.tech/news/what-are-new-trigger-modes-for-minis-external-switch-pulse-mode">What are new trigger modes for MINI’s external switch?- Pulse Mode</a>
                                        </h3>
                                        <div class="latest-post-meta">
                                            <ul class="d-flex meta-ul">
                                                <li class="mr-3">
                                                    <a href="#">
                                                        <i class="fa fa-user"></i> admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-folder-open"></i>
                                                    <a href="#" rel="category tag">Smart Home News</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="latest-post-excerpt">
                                            <p>A few days before, SONOFF made the edge mode&nbsp;of MINI two-way smart...</p>
                                        </div>
                                        <div class="latest-post-entry-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('script-after')
    <script defer  src="assets/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
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


