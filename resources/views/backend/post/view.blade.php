@extends('backend.layouts.lte')

@section('title')
    {{ $post->title }}
@stop

@section('before-styles-end')
    <style>
        .viewContent img{
            max-width: 100%;
        }
    </style>
@stop

@section('content')

    <div class="">
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white p-4">
                    <div class="form-group">
                        <h2>{{ $post->title }} <a href="{{ $post->publicUrl() }}?ref=preview" target="_blank"><i class="fad fa-external-link"></i></a></h2>
                    </div>
                    <div class="form-group">
                        <label>Nội dung bài viết</label>
                        <div class="viewContent">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Tiêu đề SEO</label>
                        <p>{{ $post->seo_title  }}</p>
                    </div>
                    <div class="form-group">
                        <label >Mô tả SEO</label>
                        <p>{{ $post->seo_description  }}</p>
                    </div>
                    <div class="form-group">
                        <label >Từ khóa SEO</label>
                        <p>{{ $post->seo_keywords  }}</p>
                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thuộc tính</h3>
                    </div>
                    <div class="card-body">
                        <div class="attr-section">
                            <h3 class="attr-title">Ảnh đại diện</h3>
                            <div class="attr-body">
                                <img class="img-fluid" src="{{ $post->thumb() }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trạng thái duyệt: <strong class="{{ $post->approveCssClass() }}">{{ $post->approveLabel() }}</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open([
                            'route' => ['backend.post.approve', ['id' => $post->id]],
                            'id' => 'PostForm'
                        ]) !!}
                        <p>Ngày duyệt: <strong>{{ $post->approve_time }}</strong></p>
                        @if($post->approve_status === \App\Models\Post::APPROVE_STATUS_PENDING || $post->approve_status === \App\Models\Post::APPROVE_STATUS_NO)
                            {!! Form::hidden('approve_status', \App\Models\Post::APPROVE_STATUS_YES) !!}
                            {!! Form::submit('Duyệt bài viết', ['class' => 'btn btn-primary']) !!}
                        @elseif($post->approve_status === \App\Models\Post::APPROVE_STATUS_YES)
                            {!! Form::hidden('approve_status', \App\Models\Post::APPROVE_STATUS_NO) !!}
                            {!! Form::submit('Hủy duyệt', ['class' => 'btn btn-danger']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>

@stop

@section('after-scripts-end')

    {!! Html::script('/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') !!}
    {!! Html::script('/assets/plugins/summernote/summernote-bs4.js') !!}


    {!! Html::script('/assets/plugins/blueimp/javascript.templates/js/tmpl.min.js') !!}
    {!! Html::script('/assets/plugins/blueimp/javascript.load-image/js/load-image.min.js') !!}
    {!! Html::script('/assets/plugins/blueimp/javascript.canvas-to-blob/js/canvas-to-blob.min.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.gallery/js/jquery.blueimp-gallery.min.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.iframe-transport.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.fileupload.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.fileupload-process.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.fileupload-image.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.fileupload-validate.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/jquery.fileupload-ui.js') !!}
    {!! Html::script('/assets/plugins/blueimp/jquery.file.upload/js/cors/jquery.xdr-transport.js') !!}

    {!! Html::script(mix('assets/backend/js/content_editor.js')) !!}
    {!! Html::script(mix('assets/backend/js/post_editor.js')) !!}

@stop
