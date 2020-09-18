<?php
Route::prefix('api')->group(function (){
    Route::prefix('image')->group(function (){
        Route::post('store', 'Backend\Api\ImageController@store')->name('backend.api.image.store');
        Route::delete('{id}/delete', 'Backend\Api\ImageController@delete')->name('backend.api.image.delete');
        Route::get('{id}/show', 'Backend\Api\ImageController@show')->name('backend.api.image.show');
    });
});
