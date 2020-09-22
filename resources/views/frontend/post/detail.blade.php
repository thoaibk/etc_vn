@extends('frontend.layouts.master')
@section('title')
    {{ $post->title  }}
@stop

@section('styles')
    {{ Html::style(mix('assets/frontend/css/post.css')) }}
@stop

@section('content')
    <div id="post-detail" class="bg-white pt-5">
        <div class="container">
            {{ Breadcrumbs::render('post', $post) }}
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-9">
                    <h1>{{ $post->title }}</h1>
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>

                    <x-related-post :excludeId="$post->id"></x-related-post>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
@stop
