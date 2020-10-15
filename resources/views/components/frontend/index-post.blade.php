<div id="section-news" class="bg-white pb-5">
    <div class="container">
        <h2 class="section-title">Tin tức - bài viết</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="news-block">
                        <a class="img-box" href="{{ $post->publicUrl() }}">
                            <img src="{{ $post->thumb('medium') }}" class="post-thumb">
                            <div class="overlay">
                            </div>
                        </a>

                        <div class="news-text">
                            <div class="date">{{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                            <h3 class="news-title">
                                <a class="text-decoration-none" href="{{ $post->publicUrl() }}" >{{ $post->title }}</a>
                            </h3>
                            <div class="description">{!! \Illuminate\Support\Str::limit($post->excerpt, 140) !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
