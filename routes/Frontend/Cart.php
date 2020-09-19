<?php
Route::prefix('cart')->group(function (){
    Route::get('gio-hang-thanh-toan', 'Frontend\CartController@index')->name('cart.index');
    Route::post('add', 'Frontend\CartController@add')->name('cart.add');
    Route::get('count', 'Frontend\CartController@count')->name('cart.count');
});
