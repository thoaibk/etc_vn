@extends('backend.layouts.lte')

@section('title')
    Sửa lĩnh vực hoạt động
@stop

@section('before-styles-end')
    {!! Html::style('/assets/plugins/blueimp/jquery.gallery/css/blueimp-gallery.min.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload-ui.css') !!}

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm danh mục</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'id' => 'categoryForm',
                'route' => ['backend.product_category.update', ['id' => $category->id]],
                'method' => 'POST',
                'class' => 'form-horizontal',
                'autocomplete' => 'off'
            ]) !!}

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Tên danh mục</label>
                <div class="col-sm-6">
                    {!! Form::input('text', 'name', $category->name, ['class' => 'form-control', 'placeholder' => 'Lĩnh vực hoạt động', 'data-lpignore' =>"true"]) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mô tả </label>
                <div class="col-sm-6">
                    {!! Form::textarea('short_desc', $category->short_desc, ['class' => 'form-control', 'rows' => 4]) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="image-upload-form">
                        {!! Form::hidden('image_id', $category->image_id, ['id' => 'image_id']) !!}
                        @include('backend.includes._image_thumb_upload_require')
                        <div id="upload-grid">
                            <div class="files row"></div>
                        </div>

                        <div class="image-upload">
                            <br/>
                            <div id="image-upload-box" class="text-center">
                                <span class="btn btn-material-teal-500 btn-sm fileinput-button margin0">
                                    <i class="fa fa-camera"></i> Ảnh hiển thị
                                    <input class="form-control" type="file" name="image_file_upload" multiple />
                                </span>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"></label>
                <div class="col-sm-6">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
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

    <script>
        $(document).ready(function() {
            var ImageId = $('#image_id');
            var uploadThumbUrl = '/backend/api/image/store?entity=category';
            /* jQuery File Upload

             -------------------------------------------------- */
            $('#categoryForm').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: uploadThumbUrl,
                autoUpload: true,
                previewMaxWidth: 120,
                previewMaxHeight: 100,

                acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
                maxFileSize: 10*1024*1024, // 10 MB
                minFileSize: undefined, // No minimal file size
                maxNumberOfFiles: 10,
                messages: {
                    maxNumberOfFiles: 'Bạn đã upload quá 10 ảnh',
                    acceptFileTypes: 'Chỉ hỗ trợ .gif .jpg. png .bmp',
                    maxFileSize: 'Ảnh phải < 10 MB'
                }

            }).bind('fileuploaddestroyed', function (e, data) {
                // hien thi lai khung chon anh
                console.log('fileuploaddestroyed')
                $('.image-upload').show();
            }).bind('fileuploadadded', function (e, data) {
                console.log('fileuploadadded');

                // an khung chon anh
                $('.image-upload').hide();
            }).bind('fileuploaddone', function (e, data) {
                console.log('fileuploaddone.............');
                if(data.result.success){
                    notifiMessage('Upload ảnh thành công', 'success');
                    ImageId.val(data.result.image_id);
                } else {
                    notifiMessage(data.result.message, 'danger')
                }
            });

            console.log('ssss', imageThumbUrl);

            // load lấy ảnh đại diện về để hiển thịs
            if(typeof imageThumbUrl != 'undefined'){

                $.ajax({
                    // Uncomment the following to send cross-domain cookies:
                    //xhrFields: {withCredentials: true},
                    url: imageThumbUrl,
                    dataType: 'json',
                    context: $('#categoryForm')[0]
                }).always(function () {
                    $(this).removeClass('fileupload-processing');
                }).done(function (result) {

                    if(result.success){
                        console.log('load image success');
                        $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
                        //$('[data-toggle="popover"]').popover();
                        $('[data-toggle="tooltip"]').tooltip();
                        $('.image-upload').hide();

                    }
                });
            }

        });

    </script>

@stop
