<div class="related-post">
    <h3 class="related-post-title">Bài viết mới nhất</h3>
    <div class="related-post-inner">
        @foreach($posts as $post)
            <div class="related-post-item">
                <a href="">
                    <div class="post-img">
                        <img src="{{ $post->thumb('small') }}" alt="{{ $post->title }}">
                    </div>
                    <div class="post-meta">
                        <h3 class="post-tltle">{{ $post->title }}</h3>
                        <div>
                            {{ $post->excerpt }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>