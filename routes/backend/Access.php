<?php
Route::prefix('access-manager')->middleware('role:admin')->group(function(){
    Route::get('user', 'Access\UserController@index')->name('access_manager.user.index');
});
