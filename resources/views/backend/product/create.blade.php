@extends('backend.layouts.lte')

@section('title')
    Thêm danh mục
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
        'route' => ['backend.product.store'],
        'id' => 'ProductForm'
    ]) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tên sản phẩm', 'autocomplete' => 'off']) !!}
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'contentEditor','placeholder' => 'Mô tả sản phẩm']) !!}
                </div>

                <div class="form-group">
                    <label >Tiêu đề SEO</label>
                    {!! Form::text('seo_title', Request::old('seo_title'), ['class' => 'form-control', 'placeholder' => 'Tiêu đề SEO', 'autocomplete' => 'off']) !!}
                </div>
                <div class="form-group">
                    <label >Mô tả SEO</label>
                    {!! Form::textarea('seo_description', Request::old('seo_description'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Mô tả SEO']) !!}
                </div>
                <div class="form-group">
                    <label >Từ khóa SEO</label>
                    {!! Form::text('seo_keywords', Request::old('seo_keywords'), ['class' => 'form-control', 'placeholder' => 'Từ khóa SEO', 'autocomplete' => 'off']) !!}
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thuộc tính</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label >Giá</label>
                            {!! Form::number('price', Request::old('price'), ['class' => 'form-control', 'placeholder' => 'Giá', 'autocomplete' => 'off']) !!}
                        </div>
                        <hr>
                        <div class="attr-section mb-2">
                            <h3 class="attr-title">Danh mục</h3>
                            <div class="attr-body">
                                @foreach($categories as $cate)
                                    <div class="form-check">
                                        <input id="cate_{{ $cate->id }}"  name="cate" value="{{ $cate->id }}" class="form-check-input" type="radio">
                                        <label for="cate_{{ $cate->id }}" class="form-check-label">{{ $cate->name }}</label>
                                        <div class="child-cate">
                                            @foreach($cate->childs as $child)
                                                <div class="form-check">
                                                    <input id="cate_{{ $child->id }}" name="cate" value="{{ $child->id }}" class="form-check-input" type="radio">
                                                    <label for="cate_{{ $child->id }}" class="form-check-label">{{ $child->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="attr-section">
                            <h3 class="attr-title">Ảnh sản phẩm</h3>
                            <div class="attr-body">
                                <div class="image-upload-form">
                                    {!! Form::hidden('image_id', null, ['id' => 'product-image_id']) !!}
                                    @include('backend.includes._image_thumb_upload_require')
                                    <div id="upload-grid">
                                        <div class="files row"></div>
                                    </div>

                                    <div class="image-upload">
                                        <br/>
                                        <div id="image-upload-box" class="text-center">
                                        <span class="btn btn-material-teal-500 btn-sm fileinput-button margin0">
                                            <i class="fa fa-camera"></i> Ảnh đại diện (300px x 400px)
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
                        {!! Form::submit('Lưu sản phẩm', ['class' => 'btn btn-primary']) !!}
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

    {!! Html::script('assets/backend/js/editor_summernote.js') !!}

@stop
