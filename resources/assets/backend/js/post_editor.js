$(document).ready(function() {

    var Image = $('#image_id');
    var uploadThumbUrl = '/backend/api/image/store?entity=post';
    /* jQuery File Upload

     -------------------------------------------------- */
    $('#PostForm').fileupload({
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
            context: $('#PostForm')[0]
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
