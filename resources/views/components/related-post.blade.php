<div class="related-post">
    <h3 class="related-post-title">Bài viết mới nhất</h3>
    <hr>
    <div class="related-post-inner">
        @foreach($posts as $post)
            <div class="related-post-item mb-4">
                <a class="related-link" href="">
                    <div class="post-img">
                        <img class="img-fluid" src="{{ $post->thumb('small') }}" alt="{{ $post->title }}">
                    </div>
                    <div class="post-meta">
                        <h3 class="post-tltle">{{ $post->title }}</h3>
                        <div class="post-excerpt">
                            {!! \Illuminate\Support\Str::limit($post->excerpt, 260) !!}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
