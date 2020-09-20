<?php
Route::prefix('cart')->group(function (){
    Route::get('gio-hang-thanh-toan', 'Frontend\CartController@index')->name('cart.index');
    Route::post('add', 'Frontend\CartController@add')->name('cart.add');
    Route::get('count', 'Frontend\CartController@count')->name('cart.count');
    Route::post('update-quantity', 'Frontend\CartController@updateQuantity')->name('cart.update_quantity');
    Route::post('remove', 'Frontend\CartController@remove')->name('cart.remove');

    Route::post('order', 'Frontend\CartController@order')->name('cart.order');
    Route::get('order-success/{hash}', 'Frontend\CartController@orderSuccess')->name('cart.order_success');
});
