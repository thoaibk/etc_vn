$(function () {
    updateNavCartCount();
});


function addToCart(productID) {
    $.ajax('/cart/add', {
        type: 'POST',
        data: {id: productID}
    }).done(function (res) {
        $('#cartSuccessModal').modal();
        updateNavCartCount();
    }).fail(function (xhr) {
        console.error(xhr);
    });
}


function updateCartQuantity(action, rowId) {
    $.ajax({
        url: '/cart/update-quantity',
        type: 'POST',
        data: {action: action, rowId: rowId}
    }).done(function (res) {
        updateNavCartCount();
        updateCartContent(res.cart_content_html);
    }).fail(function (xhr) {

    })
}


function removeCartItem(rowId) {
    $.ajax({
        url: '/cart/remove',
        type: 'POST',
        data: {rowId: rowId}
    }).done(function (res) {
        updateNavCartCount();
        updateCartContent(res.cart_content_html);
    }).fail(function (xhr) {

    })
}

function updateCartContent(cartContentHtml) {
    $('#cartContentJs').empty().html(cartContentHtml);
}

function updateNavCartCount() {
    var cartNumber = $('.nav-cart-count');
    $.get('/cart/count').done(function (res) {
        if(res.success){
            if(res.count > 0){
                cartNumber.addClass('badge badge-pill badge-danger').text(res.count);
            } else {
                cartNumber.removeClass('badge badge-pill badge-danger').text('');
            }
        }
    }).fail(function (xhr) {

    })
}
