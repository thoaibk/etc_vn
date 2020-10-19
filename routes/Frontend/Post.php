<?php

route::get('news', 'Frontend\PostController@index')->name('post.index');
route::get('article/{id}/{slug}', 'Frontend\PostController@detail')->name('post.detail');
