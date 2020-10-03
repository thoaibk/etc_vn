$(document).ready(function() {
    $('#contentEditor').summernote({
        placeholder: 'Nội dung',
        tabsize: 2,
        height: 500,
        callbacks: {
            onImageUpload: function(image) {
                editorUploadImage(image[0]);
            },
            onMediaDelete : function($target, editor, $editable) {
                editorRemoveImage($target[0]);
            }
        }
    });


    function editorUploadImage(image) {
        var data = new FormData();
        data.append("image_file_upload", image);
        $.ajax({
            url: '/backend/api/image/store?entity=content&temp=medium',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",

        }).done(function (res) {
            if(res.success){
                var image = $('<img>').attr('src', res.files[0].url).attr('delete-url', res.files[0].delete_url);
                $('#contentEditor').summernote("insertNode", image[0]);
            } else {
                notifiMessage(res.message, 'danger');
            }
        }).fail(function (xhr) {
            notifiMessage(formatErrorAjaxMessage(xhr), 'danger');
        })
    }

    function editorRemoveImage(image) {
        var deleteUrl = $(image).attr('delete-url');
        $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            dataType: 'json',
        }).done(function (result) {
            if(result.success){

            }
        }).fail(function (xhr) {
            notifiMessage(formatErrorAjaxMessage(xhr), 'danger');
        })
    }
});
