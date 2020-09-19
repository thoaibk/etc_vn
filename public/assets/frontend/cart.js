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
