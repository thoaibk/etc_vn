<?php

Route::get('/cate/{slug}', 'Frontend\ProductController@category')->name('product.category');

Route::get('/san-pham/{slug}', 'Frontend\ProductController@detail')->name('product.detail');
