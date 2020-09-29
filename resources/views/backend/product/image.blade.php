@extends('backend.layouts.lte')

@section('title')
    Danh mục sản phẩm
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

    @include('backend.includes._product_nav')

    <div class="mt-4">

        <div class="row">
            <div class="col-lg-4">
                {!! Form::open([
                    'id' => 'productImageForm'
                ]) !!}

                @include('backend.includes._image_thumb_upload_require')
                <div id="upload-grid">
                    <div class="files row"></div>
                </div>

                <div class="image-upload">
                    <br/>
                    <div id="image-upload-box" class="text-center">
                        <span class="btn btn-sm fileinput-button margin0">
                            <i class="fa fa-camera"></i> Chọn ảnh
                            <input class="form-control" type="file" name="image_file_upload" multiple />
                        </span>
                    </div>
                    <br/>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ảnh sản phẩm</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(count($images) > 0)
                                @foreach($images as $image)
                                    <div id="image_{{ $image->id }}" class="col-md-2">
                                        <div class="image-item">
                                            <img class="img-fluid img-rounded img-bordered" src="{{ $image->getImageSrc('medium') }}" alt="">
                                            <button class="btn-delete btn btn-danger btn-sm" title="Xóa"
                                                    onclick="deleteImage('{{ $image->id }}', '{{ route('backend.product.remote_image', ['id' => $product->id, 'imageId' => $image->id]) }}')"
                                            >
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <p class=""><i>Sản phẩm chưa có ảnh nào</i></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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

            var uploadThumbUrl = '{{ route('backend.product.store_image', ['id' => $product->id]) }}';
            /* jQuery File Upload
             -------------------------------------------------- */
            $('#productImageForm').fileupload({
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
                    location.reload();
                }
            });
        })


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




@endsection
