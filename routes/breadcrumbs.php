<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', '/');
});

// Home > Product > Product name
Breadcrumbs::for('product-detail', function ($trail, $product) {
    $trail->parent('home');
    $trail->push($product->name, $product->publicUrl());
});

// Home > About
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Giỏ hàng thanh toán', route('cart.index'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
