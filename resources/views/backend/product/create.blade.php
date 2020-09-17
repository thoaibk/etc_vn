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
        'id' => 'ProductForm'
    ]) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'contentEditor','placeholder' => 'Mô tả sản phẩm']) !!}
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thuộc tính</h3>
                    </div>
                    <div class="card-body">
                        Danh mục
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

                            <div><i>Hình ảnh đại diện nên để kích thước tiêu chuẩn (300px x 400px). Nếu upload ảnh có kích thước lớn hơn hệ thống sẽ tự động crop và có thể làm ảnh
                                    hưởng đến kích thước hiển thị mong muốn</i></div>
                        </div>
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
