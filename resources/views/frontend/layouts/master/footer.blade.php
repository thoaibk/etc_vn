<div id="footer" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer2">
                    <div>
                        <a class="footer-brand p-2" href="#">
                            <img style="height: 35px" src="/image/etc.png" alt="">
                        </a>
                    </div>
                    <div class="footer-main text-white">
                        <p class="mb-1 mt-3">
                            <span class="text-uppercase"><b>{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_NAME, true) }}</b></span>
                        </p>
                        <p class="mb-1">
                            Hotline: <b>{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_HOTLINE, true) }}</b>
                        </p>
                        <p class="mb-1">
                            Email: <b>{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_EMAIL, true) }}</b>
                        </p>
                        <p class="mb-1">
                            Địa chỉ: <b>{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_ADDRESS, true) }}</b>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-1 text-white">
                            <h3 class="footer-title mb-3 text-uppercase">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_LEFT_TITLE, true) }}</h3>
                            @foreach($footerWidgetLeft as $left)
                                <p class="mb-1"><a class="footer-link text-decoration-none" href="{{ $left['link'] }}">{{ $left['title'] }}</a></p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-1">
                            <h3 class="footer-title mb-3 text-uppercase">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_CENTER_TITLE, true) }}</h3>
                            @foreach($footerWidgetCenter as $center)
                                <p class="mb-1"><a class="footer-link text-decoration-none" href="{{ $center['link'] }}">{{ $center['title'] }}</a></p>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="footer-1">
                            <h3 class="footer-title mb-3 text-uppercase">Social</h3>
                            <div class="social-connect d-flex">
                                @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE, true))
                                    <div class="social-item mr-3">
                                        <a class="social-link pl-0 youtube" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE, true) }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                @endif
                                @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK, true))
                                        <div class="social-item mr-3">
                                            <a class="social-link facebook" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK, true) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </div>
                                @endif
                                @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER, true))
                                        <div class="social-item mr-3">
                                            <a class="social-link facebook" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER, true) }}" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                                        </div>
                                @endif
                                @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_EMAIL, true))
                                    <div class="social-item mr-3">
                                        <a class="social-link email" href="mailto:{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_EMAIL, true) }}"><i class="fal fa-envelope"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="coppy-right text-white">
                    <p class="">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_COPYRIGHT, true) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
