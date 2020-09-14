<?php

Route::prefix('backend')->namespace('Backend')->middleware('permission:view_admin')->group(function(){

    require 'Access.php';

    Route::prefix('product-category')->group(function(){

        Route::get('create', 'ProductCategoryController@create')->name('backend.product_category.index');
    });
    Route::prefix('product')->group(function(){

//        Route::get('category/create', 'Backend\ProductCategoryController@create')->name('backend.product_category.index');
    });
});
