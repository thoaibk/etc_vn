<?php

Route::prefix('backend')->middleware('permission:view_admin')->group(function(){

    require 'Access.php';

    Route::prefix('product-category')->group(function(){
        Route::get('/', 'Backend\ProductCategoryController@index')->name('backend.product_category.index');
        Route::get('create', 'Backend\ProductCategoryController@create')->name('backend.product_category.create');
        Route::post('store', 'Backend\ProductCategoryController@store')->name('backend.product_category.store');
        Route::get('/{id}/edit', 'Backend\ProductCategoryController@edit')->name('backend.product_category.edit');
        Route::post('/{id}/update', 'Backend\ProductCategoryController@update')->name('backend.product_category.update');
        Route::post('/{id}/toggle-status', 'Backend\ProductCategoryController@toggleStatus')->name('backend.product_category.toggle_status');
        Route::delete('/{id}/delete', 'Backend\ProductCategoryController@destroy')->name('backend.product_category.destroy');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', 'Backend\ProductController@index')->name('backend.product.index');

        Route::get('/create', 'Backend\ProductController@create')->name('backend.product.create');
        Route::post('/create', 'Backend\ProductController@store')->name('backend.product.store');

        Route::get('/{id}/update', 'Backend\ProductController@edit')->name('backend.product.edit');
        Route::post('/{id}/update', 'Backend\ProductController@update')->name('backend.product.update');

        Route::post('/{id}/toggle-status', 'Backend\ProductController@toggleStatus')->name('backend.product.toggle_status');
        Route::delete('/{id}/delete', 'Backend\ProductController@destroy')->name('backend.product.destroy');
    });
});
