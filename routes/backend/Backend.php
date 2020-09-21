<?php

Route::prefix('backend')->middleware('permission:view_admin')->group(function(){

    require 'Access.php';
    require 'BackendApi.php';

    Route::get('/', 'Backend\DashboardController@index')->name('backend.dashboard');

    Route::prefix('order')->group(function(){
        Route::get('/', 'Backend\OrderController@index')->name('backend.order.index');
        Route::get('{id}/view', 'Backend\OrderController@view')->name('backend.order.view');
    });

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

        Route::get('/{id}/images', 'Backend\ProductController@images')->name('backend.product.images');
        Route::post('/{id}/store-image', 'Backend\ProductController@storeImage')->name('backend.product.store_image');
        Route::delete('/{id}/remove-image/{imageId}', 'Backend\ProductController@remoteImage')->name('backend.product.remote_image');

        Route::post('/{id}/toggle-status', 'Backend\ProductController@toggleStatus')->name('backend.product.toggle_status');
        Route::delete('/{id}/delete', 'Backend\ProductController@destroy')->name('backend.product.destroy');
    });

    Route::prefix('post')->group(function(){
        Route::get('/', 'Backend\PostController@index')->name('backend.post.index');
        Route::get('create', 'Backend\PostController@create')->name('backend.post.create');
        Route::post('store', 'Backend\PostController@store')->name('backend.post.store');
        Route::get('/{id}/edit', 'Backend\PostController@edit')->name('backend.post.edit');
        Route::post('/{id}/update', 'Backend\PostController@update')->name('backend.post.update');
        Route::post('/{id}/toggle-status', 'Backend\PostController@toggleStatus')->name('backend.post.toggle_status');
        Route::delete('/{id}/delete', 'Backend\PostController@destroy')->name('backend.post.destroy');
    });
});
