<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-1">
                            <h3 class="footer1-title text-white mb-3">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_NAME, true) }}</h3>
                            <p class="mb-1 text-white">Hotline: {{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_HOTLINE, true) }}</p>
                            @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_PHONE, true))
                                <p class="mb-1 text-white">Điện thoại: {{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_PHONE, true) }}</p>
                            @endif
                            <p class="mb-1 text-white">Địa chỉ: {{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_ADDRESS, true) }}</p>
                            <p class="mb-1 text-white">Email: <a href="mailto:{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_EMAIL, true) }}">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_EMAIL, true) }}</a></p>
                            <p class="mb-1 text-white">Web: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-1">
                            <h3 class="footer1-title text-white mb-3">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_LEFT_TITLE, true) }}</h3>
                            @foreach($footerWidgetLeft as $left)
                                <p class="mb-1"><a class="footer-link text-decoration-none" href="{{ $left['link'] }}">{{ $left['title'] }}</a></p>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="footer-1">
                            <h3 class="footer1-title text-white mb-3">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_CENTER_TITLE, true) }}</h3>
                            @foreach($footerWidgetCenter as $center)
                                <p class="mb-1"><a class="footer-link text-decoration-none" href="{{ $center['link'] }}">{{ $center['title'] }}</a></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer2">
                    <h3 class="footer1-title text-white mb-3">Kết nối với chúng tôi</h3>
                    <div class="social-connect d-flex">
                        @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE, true))
                            <div class="social-item">
                                <a class="social-link pl-0 youtube" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE, true) }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        @endif
                        @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK, true))
                            <div class="social-item">
                                <a class="social-link facebook" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK, true) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        @endif
                        @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER, true))
                            <div class="social-item">
                                <a class="social-link facebook" href="{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER, true) }}" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                            </div>
                        @endif
                        @if(\App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_EMAIL, true))
                            <div class="social-item">
                                <a class="social-link email" href="mailto:{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_EMAIL, true) }}"><i class="fal fa-envelope"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="coppy-right footer-link">
                    <p class="">{{ \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_COPYRIGHT, true) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
