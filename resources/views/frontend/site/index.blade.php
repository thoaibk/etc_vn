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

    <div id="section-partner" class="bg-white py-5">
        <div class="container">
            <h2 class="section-title">Tại sao chọn chúng tôi</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="myselect">
                        <div class="select-img">
                            <img class="img-fluid" src="/image/reason/service.jpg" alt="Tự nguyện phục vụ khách hàng">
                        </div>
                        <div class="select-title text-uppercase text-center text-bold mt-2">
                            <strong>Tự nguyện phục vụ khách hàng</strong>
                        </div>
                        <div class="select-desc text-justify mt-2">
                            Với tinh thần tự nguyện phục vụ, ETCVN luôn đáp ứng tối đa về chất lượng và tiến độ theo yêu cầu của khách hàng. Áp dụng hiệu quả các quy trình quản lý chuất lượng, các công cụ quản trị công ty, nhằm đưa công ty phát triển ổn định, bền vững tạo niềm tin với khách hàng, đối tác.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="myselect">
                        <div class="select-img">
                            <img class="img-fluid" src="/image/reason/growth.jpg" alt="Luôn quan tâm duy trì và chú trọng phát triển">
                        </div>
                        <div class="select-title text-uppercase text-center text-bold mt-2">
                            <strong>Luôn quan tâm duy trì và chú trọng phát triển</strong>
                        </div>
                        <div class="select-desc text-justify mt-2">
                            Luôn quan tâm duy trì và chú trọng phát triển nguồn nhân lực chất lượng cao, bằng cách đào tạo thường xuyên và tổ chức các chuyên đề nghiên cứu đánh giá, nhằm làm chủ được tốc độ phát triển của thiết bị công nghệ trên Thế Giới.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="myselect">
                        <div class="select-img">
                            <img class="img-fluid" src="/image/reason/sv1.png" alt="Chú trọng nâng cao dịch vụ chính sách chất lượng">
                        </div>
                        <div class="select-title text-uppercase text-center text-bold mt-2">
                            <strong>Chú trọng nâng cao dịch vụ chính sách chất lượng</strong>
                        </div>
                        <div class="select-desc text-justify mt-2">
                            Chú trọng nâng cao chất lượng thí nghiệm kiểm định bằng cách chủ động cải tiến phương pháp, đầu tư các trang thiết bị máy móc tiên tiến, hiện đại. Thường xuyên cập nhật và triển khai áp dụng các phương pháp thí nghiệm mới tiên tiến, mở rộng thêm các thí nghiệm phân tích chuyên sâu có tính ứng dụng cao và hiệu quả...
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="myselect">
                        <div class="select-img">
                            <img class="img-fluid" src="/image/reason/education.jpg" alt="Đào tạo liên tục thường xuyên CBNV">
                        </div>
                        <div class="select-title text-uppercase text-center text-bold mt-2">
                            <strong>Đào tạo liên tục thường xuyên CBNV</strong>
                        </div>
                        <div class="select-desc text-justify mt-2">
                            Có chính sách để CBNV được học tập nâng cao trình độ. CBNV được tạo cơ hội cống hiến, thăng tiến và có chính sách đãi ngộ xứng đáng đúng mức với hiệu quả công việc của mỗi người.
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


