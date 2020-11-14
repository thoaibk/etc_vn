<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', '/');
});

// Home > Product > Product name
Breadcrumbs::for('product-detail', function ($trail, $product) {
    $trail->parent('home');
    $trail->push('Dịch vụ',route('product.index'));
    $trail->push($product->name, $product->publicUrl());
});

// Home > About
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Giỏ hàng thanh toán', route('cart.index'));
});
// Home > Post
Breadcrumbs::for('post', function ($trail) {
    $trail->parent('home');
    $trail->push('Tin tức', route('post.index'));
});
// Home > Post > detail
Breadcrumbs::for('post_detail', function ($trail, $post) {
    $trail->parent('home');
    $trail->push('Tin tức', route('post.index'));
    $trail->push($post->title, $post->publicUrl());
});

// Home > Blog > [Category]
Breadcrumbs::for('service', function ($trail) {
    $trail->parent('home');
    $trail->push('Dịch vụ', route('product.index'));
});

