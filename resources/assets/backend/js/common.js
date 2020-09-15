/**
 * @desc: Handle lỗi khi ajax
 * @param jqXHR
 * @param exception
 * @returns {*}
 *
 */
function formatErrorAjaxMessage(jqXHR, exception=null) {
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found. [404]');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error [500].');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    } else {
        return ('Uncaught Error.\n' + jqXHR.responseText);
    }
}

/**
 * @desc: Show show notifi message
 * @param message
 * @param type
 */
function notifiMessage(message, type) {
    if(type === 'danger'){
        toastr.error(message);
    } else {
        toastr.success(message);
    }
}

function backend_notification(type, title, message) {
    $.notify({
        // options
        icon: '',
        title: title,
        message: message
//                url: 'https://github.com/mouse0270/bootstrap-notify',
//                target: '_blank'
    },{
        // settings
        element: 'body',
        position: null,
        type: type,
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "top",
            align: "right"
        },
        offset: 55,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
//                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
//                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
//                '<span data-notify="icon"></span> ' +
//                '<span data-notify="title">{1}</span> ' +
//                '<span data-notify="message">{2}</span>' +
//                '<div class="progress" data-notify="progressbar">' +
//                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
//                '</div>' +
//                '<a href="{3}" target="{4}" data-notify="url"></a>' +
//                '</div>'
    });
}

function toggleTableStatus(obj, url) {
    $.post(url, function (res) {
        notifiMessage(res.message, 'success');

        $(obj).attr('class', res.icon);
        $(obj).parent().attr('title', res.status_label);
    }).done(function () {

    }).fail(function (xhr, exception) {
        var message = formatErrorAjaxMessage(xhr,exception);
        notifiMessage(message, 'danger')
    })
}


function deleteTableRow(rowID, deleteUrl) {

    $.confirm({
        title: 'Xác nhận xóa dữ liệu',
        content: 'Sau khi xóa dữ liệu sẽ không thể khôi phục',
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
                    $.ajax(deleteUrl, {
                        type: 'DELETE'
                    }).done(res => {
                        if(res.success){
                            notifiMessage(res.message, 'success');
                            $('#row_' + rowID).remove();
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
