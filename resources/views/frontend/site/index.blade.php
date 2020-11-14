@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
@stop

@section('content')

    <x-banner></x-banner>

    <div id="out-services" >
        <div class="container">
            <h2 class="section-title">Dịch vụ của chúng tôi</h2>
            <x-product-index></x-product-index>
        </div>
    </div>

    <div id="we-choice" class="bg-white py-5">
        <div class="container">
            <h2 class="section-title">Tại sao chọn chúng tôi</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="choice-box">
                        <div class="choice-img">
                            <img class="img-fluid" src="/image/reason/service.jpg" alt="Tự nguyện phục vụ khách hàng">
                        </div>
                        <div class="choice-title text-uppercase text-center text-bold mt-2">
                            <strong>Tự nguyện phục vụ khách hàng</strong>
                        </div>
                        <div class="choice-desc text-justify mt-2">
                            Với tinh thần tự nguyện phục vụ, ETCVN luôn đáp ứng tối đa về chất lượng và tiến độ theo yêu cầu của khách hàng. Áp dụng hiệu quả các quy trình quản lý chuất lượng, các công cụ quản trị công ty, nhằm đưa công ty phát triển ổn định, bền vững tạo niềm tin với khách hàng, đối tác.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="choice-box">
                        <div class="choice-img">
                            <img class="img-fluid" src="/image/reason/growth.jpg" alt="Luôn quan tâm duy trì và chú trọng phát triển">
                        </div>
                        <div class="choice-title text-uppercase text-center text-bold mt-2">
                            <strong>Luôn quan tâm duy trì và chú trọng phát triển</strong>
                        </div>
                        <div class="choice-desc text-justify mt-2">
                            Luôn quan tâm duy trì và chú trọng phát triển nguồn nhân lực chất lượng cao, bằng cách đào tạo thường xuyên và tổ chức các chuyên đề nghiên cứu đánh giá, nhằm làm chủ được tốc độ phát triển của thiết bị công nghệ trên Thế Giới.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="choice-box">
                        <div class="choice-img">
                            <img class="img-fluid" src="/image/reason/sv1.png" alt="Chú trọng nâng cao dịch vụ chính sách chất lượng">
                        </div>
                        <div class="choice-title text-uppercase text-center text-bold mt-2">
                            <strong>Chú trọng nâng cao dịch vụ chính sách chất lượng</strong>
                        </div>
                        <div class="choice-desc text-justify mt-2">
                            Chú trọng nâng cao chất lượng thí nghiệm kiểm định bằng cách chủ động cải tiến phương pháp, đầu tư các trang thiết bị máy móc tiên tiến, hiện đại. Thường xuyên cập nhật và triển khai áp dụng các phương pháp thí nghiệm mới tiên tiến, mở rộng thêm các thí nghiệm phân tích chuyên sâu có tính ứng dụng cao và hiệu quả...
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="choice-box">
                        <div class="choice-img">
                            <img class="img-fluid" src="/image/reason/education.jpg" alt="Đào tạo liên tục thường xuyên CBNV">
                        </div>
                        <div class="choice-title text-uppercase text-center text-bold mt-2">
                            <strong>Đào tạo liên tục thường xuyên CBNV</strong>
                        </div>
                        <div class="choice-desc text-justify mt-2">
                            Có chính sách để CBNV được học tập nâng cao trình độ. CBNV được tạo cơ hội cống hiến, thăng tiến và có chính sách đãi ngộ xứng đáng đúng mức với hiệu quả công việc của mỗi người.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="counter-show" class="py-4">
        <div class="container">
            <div class="random-wrap">
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-3">
                        <div class="counter text-center">
                            <div class="counter-title">6</div>
                            <div class="counter-desc text-uppercase text-white"><strong>Năm kinh nghiệm</strong></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3">
                        <div class="counter text-center">
                            <div class="counter-title">40</div>
                            <div class="counter-desc text-uppercase text-white"><strong>Nhân viên chuyên nghiệp</strong></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3">
                        <div class="counter text-center">
                            <div class="counter-title">300+</div>
                            <div class="counter-desc text-uppercase text-white"><strong>Khách hàng thân thiết</strong></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3">
                        <div class="counter text-center">
                            <div class="counter-title">400+</div>
                            <div class="counter-desc text-uppercase text-white"><strong>Công trình</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section-image-collection" class="pt-5">
        <div class="container">
            <h2 class="section-title mt-0">Thư viện ảnh</h2>
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

    <div id="section-partner" class="bg-white pb-5">
        <div class="container">
            <h2 class="section-title">Đối tác</h2>
            <div class="d-flex">
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/hoaphat.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/jangwon.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/logo-EVN-HN.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/logo-EVN-NPC.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/PC-YENBAI.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/pomina2.jpg" alt="">
                </div>
                <div class="partner-item p-2">
                    <img class="img-fluid" src="/image/partner/samsung.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
@stop

@section('script-after')

@stop


