<?php

Route::get('/service', 'Frontend\ProductController@index')->name('product.index');

Route::get('/service/{slug}', 'Frontend\ProductController@detail')->name('product.detail');
