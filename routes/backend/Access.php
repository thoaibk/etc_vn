<?php
Route::prefix('access-manager')->middleware('role:admin')->group(function(){
    Route::get('user', 'Access\UserController@index')->name('access_manager.user.index');
    Route::get('user/{id}/edit', 'Access\UserController@edit')->name('access_manager.user.edit');
    Route::post('user/{id}/update', 'Access\UserController@update')->name('access_manager.user.update');
});
