@extends('backend.layouts.lte')

@section('title')
    {{ $post->title }}
@stop

@section('before-styles-end')
    {!! Html::style('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') !!}

    {!! Html::style('/assets/plugins/blueimp/jquery.gallery/css/blueimp-gallery.min.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload-ui.css') !!}

@stop

@section('content')

    <div class="">
        {!! Form::open([
            'route' => ['backend.post.update', ['id' => $post->id]],
            'id' => 'PostForm'
        ]) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white p-4">
                    <div class="form-group">
                        <h2>{{ $post->title }} <a href="{{ $post->publicUrl() }}?ref=preview" target="_blank"><i class="fad fa-external-link"></i></a></h2>
                    </div>
                    <div class="form-group">
                        <label>Nội dung bài viết</label>
                        <div>
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
                                <div class="image-upload-form">
                                    {!! Form::hidden('image_id', $post->image_id, ['id' => 'image_id']) !!}
                                    @include('backend.includes._image_thumb_upload_require')
                                    <div id="upload-grid">
                                        <div class="files row"></div>
                                    </div>

                                    <div class="image-upload">
                                        <br/>
                                        <div id="image-upload-box" class="text-center">
                                        <span class="btn btn-material-teal-500 btn-sm fileinput-button margin0">
                                            <i class="fa fa-camera"></i> Chọn ảnh
                                            <input class="form-control" type="file" name="image_file_upload" multiple />
                                        </span>
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Lưu bài viết', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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
