<div class="owl-carousel owl-theme">
    @foreach($posts as $post)
        <div class="item">
            <div class="latest-post-item">
                <div class="latest-post-item-inner">
                    <div class="latest-post-image">
                        <img src="{{ $post->thumb('medium') }}" class="" alt="{{ $post->title }}">
                    </div>
                    <div class="latest-post-content">
                        <div class="post-date">
                            <div class="post-date-inner"> 14<span>Aug</span></div>
                        </div>
                        <h3 class="blog-title">
                            <a href="{{ $post->publicUrl() }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <div class="latest-post-meta">
                            <ul class="d-flex meta-ul">
                                @if($post->user)
                                    <li class="mr-3">
                                        <span href="#">
                                            <i class="fa fa-user"></i> {{ $post->user->name }}
                                        </span>
                                    </li>
                                @endif
{{--                                <li>--}}
{{--                                    <i class="fa fa-folder-open"></i>--}}
{{--                                    <a href="#" rel="category tag">Smart Home News</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                        <div class="latest-post-excerpt">
                            <p>{!! $post->excerpt !!} </p>
                        </div>
                        <div class="latest-post-entry-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
