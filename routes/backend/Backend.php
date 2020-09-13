<?php

Route::prefix('backend')->group(function(){
    Route::prefix('product-category')->group(function(){

        Route::get('create', 'Backend\ProductCategoryController@create')->name('backend.product_category.index');
    });
    Route::prefix('product')->group(function(){

//        Route::get('category/create', 'Backend\ProductCategoryController@create')->name('backend.product_category.index');
    });
});
