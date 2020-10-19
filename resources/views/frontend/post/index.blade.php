@extends('frontend.layouts.master')

@section('styles')

@stop

@section('content')

    <div id="news-index" class="bg-white pt-5">
        <div class="container">
            {{ Breadcrumbs::render('post') }}
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    @foreach($posts as $post)
                        <div class="row article-item">
                            <div class="col-md-5">
                                <a href="{{ $post->publicUrl() }}">
                                    <img src="{{ $post->thumb('medium') }}" alt="{{ $post->title }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="article-meta">
                                    <h3 class="article-title"><a href="{{ $post->publicUrl() }}">{{ $post->title }}</a></h3>
                                    <div class="article-publish-date"><i class="fal fa-clock"></i> {{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                                    <div class="article-excerpt">
                                        {!! \Illuminate\Support\Str::limit($post->excerpt, 300) !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{
                        $posts->appends([])->links('vendor.pagination.frontend-bootstrap-4')
                    }}
                </div>
            </div>
        </div>
    </div>
@stop
