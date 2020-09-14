<?php

Route::prefix('backend')->middleware('permission:view_admin')->group(function(){

    require 'Access.php';

    Route::prefix('product-category')->group(function(){
        Route::get('/', 'Backend\ProductCategoryController@index')->name('backend.product_category.index');
        Route::get('create', 'Backend\ProductCategoryController@create')->name('backend.product_category.create');
        Route::post('store', 'Backend\ProductCategoryController@store')->name('backend.product_category.store');
        Route::get('/{id}/edit', 'Backend\ProductCategoryController@edit')->name('backend.product_category.edit');
        Route::post('/{id}/update', 'Backend\ProductCategoryController@update')->name('backend.product_category.update');
        Route::delete('/{id}/delete', 'Backend\ProductCategoryController@destroy')->name('backend.product_category.destroy');
        Route::delete('/{id}/delete', 'Backend\ProductCategoryController@destroy')->name('backend.product_category.destroy');
    });
    Route::prefix('product')->group(function(){

//        Route::get('category/create', 'Backend\ProductCategoryController@create')->name('backend.product_category.index');
    });
});
