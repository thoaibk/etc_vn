<?php
Route::prefix('api')->group(function (){
    Route::prefix('image')->group(function (){
        Route::post('store', 'Backend\Api\ImageController@store')->name('backend.api.image.store');
    });
});