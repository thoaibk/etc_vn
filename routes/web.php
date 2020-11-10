<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email', 'Frontend\SiteController@testEmail');
Route::get('/', 'Frontend\SiteController@index')->name('app.index');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


require 'backend/Backend.php';

Route::get('/detail', function (){
    return view('frontend.site.detail');
});


// Frontend route
require 'Frontend/Product.php';
require 'Frontend/Cart.php';
require 'Frontend/Post.php';

require 'sitemap/sitemap.php';
