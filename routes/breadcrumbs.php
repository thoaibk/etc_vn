<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', '/');
});

// Home > Product > Product name
Breadcrumbs::for('product-detail', function ($trail, $product) {
    $trail->parent('home');
    $trail->push($product->category->name, $product->category->publicUrl());
    $trail->push($product->name, $product->publicUrl());
});

// Home > About
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Giỏ hàng thanh toán', route('cart.index'));
});

// Home > Post
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('home');
    $trail->push($post->title, $post->publicUrl());
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, $category->publicUrl());
});

