@extends('backend.layouts.lte')
@section('title')
    Banner
@stop

@section('before-styles-end')
    {!! Html::style('/assets/plugins/blueimp/jquery.gallery/css/blueimp-gallery.min.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload.css') !!}
    {!! Html::style('/assets/plugins/blueimp/jquery.file.upload/css/jquery.fileupload-ui.css') !!}
    <style>
        .image-upload{
            border: dashed 2px silver;
            border-radius: 5px;
        }
        .image-item{
            position: relative;
        }
        .image-item .btn-delete{
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cài đặt banner</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => isset($banner) ? ['backend.banner.update', ['id' => $banner_id]] : ['backend.banner.store'],
                'id' => 'bannerForm'
            ]) !!}

            <div class="form-group">
                <div class="attr-body">
                    <div class="image-upload-form">
                        {!! Form::hidden('image_id', isset($banner) ? $banner['image_id'] : null , ['id' => 'image_id']) !!}
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

            <div class="form-group">
                <label for="">Link</label>
                <textarea name="link" id="" rows="2" class="form-control">{{ isset($banner) ? $banner['link'] : null }}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu banner</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('after-scripts-end')
    {!! Html::script('/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') !!}

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
        $(function () {

            var Image = $('#image_id');
            var uploadThumbUrl = '/backend/api/image/store?entity=banner';
            /* jQuery File Upload
             -------------------------------------------------- */
            $('#bannerForm').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: uploadThumbUrl,
                autoUpload: true,
                previewMaxWidth: 345,
                previewMaxHeight: 108,

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
                    notifiMessage('Upload thành công', 'success')
                    Image.val(data.result.image_id);
                } else {
                    notifiMessage(data.result.message, 'danger')
                }

            });


            // load lấy ảnh đại diện về để hiển thịs
            if(typeof imageThumbUrl != 'undefined'){

                console.log('ssss', imageThumbUrl);
                $.ajax({
                    // Uncomment the following to send cross-domain cookies:
                    //xhrFields: {withCredentials: true},
                    url: imageThumbUrl,
                    dataType: 'json',
                    context: $('#bannerForm')[0]
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


        function deleteImage(imageId, removeUrl) {
            $.confirm({
                title: 'Xác nhận xóa ',
                content: 'Sau khi xóa ảnh sẽ không thể khôi phục',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    close: {
                        text: 'Hủy',
                        btnClass: 'btn-default',
                        action: function(){

                        }
                    },

                    confirmDelete: {
                        text: 'Xóa',
                        btnClass: 'btn-red',
                        action: function(){
                            $.ajax(removeUrl, {
                                type: 'DELETE'
                            }).done(res => {
                                if(res.success){
                                    notifiMessage(res.message, 'success');
                                    $('#image_' + imageId).remove();
                                }
                            }).fail(function (xhr, exception) {
                                var message = formatErrorAjaxMessage(xhr,exception);
                                notifiMessage(message, 'danger')
                            });
                        }
                    }
                }
            });
        }
    </script>
@stop
