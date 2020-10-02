<?php
Route::prefix('access-manager')->middleware('role:admin')->group(function(){
    Route::get('user', 'Backend\Access\UserController@index')->name('access_manager.user.index');
    Route::get('user/create', 'Backend\Access\UserController@create')->name('access_manager.user.create');
    Route::get('user/{id}/edit', 'Backend\Access\UserController@edit')->name('access_manager.user.edit');
    Route::post('user/{id}/update', 'Backend\Access\UserController@update')->name('access_manager.user.update');
});
