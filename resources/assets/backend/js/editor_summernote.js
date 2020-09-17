$(document).ready(function() {

    // $.summernote.options.keyMap.pc['CTRL+K'] = 'InsertLink.show';
    // $.summernote.options.keyMap.mac['CMD+K'] = 'InsertLink.show';
    //
    // // Define function to open filemanager window
    // var lfm = function(options, cb) {
    //     var route_prefix = (options && options.prefix) ? options.prefix : '/media';
    //     window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    //     window.SetUrl = cb;
    // };
    //
    // // Define LFM summernote button
    // var LFMButton = function(context) {
    //     var ui = $.summernote.ui;
    //     var button = ui.button({
    //         contents: '<i class="note-icon-picture"></i> ',
    //         tooltip: 'Insert image with filemanager',
    //         click: function() {
    //             lfm({type: 'image', prefix: '/media'}, function(lfmItems, path) {
    //                 context.invoke('insertImage', lfmItems);
    //                 // lfmItems.forEach(function (lfmItem) {
    //                 //     context.invoke('insertImage', lfmItem.url);
    //                 // });
    //             });
    //
    //         }
    //     });
    //     return button.render();
    // };

    $('#contentEditor').summernote({
        placeholder: 'Mô tả sản phẩm',
        tabsize: 2,
        height: 500,
        // lang: 'en-US',
        // followingToolbar: true,
        // imageTitle: {
        //     specificAltField: true,
        // },
        // tooltip: true,
        // prettifyHtml:true,
        // toolbar: [
        //     ['style', ['style']],
        //     ['font', ['bold', 'underline', 'italic', 'clear']],
        //     ['color', ['color']],
        //     ['list', ['ul', 'ol']],
        //     ['para', ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull','outdent','indent']],
        //     ['table', ['table']],
        //     ['insert', ['image', 'video']],
        //     ['view', ['fullscreen']],
        //     ['highlight', ['highlight']]
        // ],
        // buttons: {
        //     lfm: LFMButton
        // },
        // popover: {
        //     image: [
        //         ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
        //         ['float', ['floatLeft', 'floatCenter','floatRight', 'floatNone']],
        //         ['remove', ['removeMedia']],
        //         ['custom', ['imageTitle']],
        //     ],
        //     link: [
        //         ['link', ['InsertLink', 'unlink']]
        //     ],
        // },
    });
    // $('[data-original-title="Recent Color"]').attr('data-backcolor','transparent');
    // $('i.note-recent-color').attr("style", "background-color: transparent");


    var imageId = $('#product-image_id').val();

    var uploadThumbUrl = '/admin/product/store-image';
    /* jQuery File Upload

     -------------------------------------------------- */
    $('#ProductForm').fileupload({
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


        //
        // var response = data;
        // console.log(typeof data);
        // console.log(data);

        // an khung chon anh
        $('.image-upload').hide();
    }).bind('fileuploaddone', function (e, data) {
        console.log('fileuploaddone.............');

        if(data.result.success){
            $('#productCreateImageId').val(data.result.image_id);
        }


    });



    // load lấy ảnh đại diện về để hiển thịs
    if(typeof imageThumbUrl != 'undefined'){

        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: imageThumbUrl,
            dataType: 'json',
            context: $('#post-form')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {

            if(result.success){
                $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
                //$('[data-toggle="popover"]').popover();
                $('[data-toggle="tooltip"]').tooltip();
                $('.image-upload').hide();

            }
        });
    }

});
