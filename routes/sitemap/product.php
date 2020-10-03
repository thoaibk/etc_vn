<?php

Route::get('sitemap-product', function() {

    // create new sitemap object
    $sitemap = App::make('sitemap');

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 60);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached()) {
        // get all posts from db, with image relations
        $products = \DB::table('products')->orderBy('created_at', 'desc')->get();

        // add every post to the sitemap
        foreach ($products as $product) {
            $sitemap->add(route('product.detail', ['slug' => $product->slug]), $product->updated_at, '1.0', 'daily');
        }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
});
