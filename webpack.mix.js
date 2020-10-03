const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy('resources/assets/plugins', 'public/assets/plugins');
mix.copy('resources/assets/img', 'public/assets/img');

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/assets/sass/master.scss', 'public/assets/css');

mix.sass('resources/assets/frontend/scss/product_detail.scss', 'public/assets/frontend/css');
mix.sass('resources/assets/frontend/scss/cart_index.scss', 'public/assets/frontend/css');
mix.sass('resources/assets/frontend/scss/post.scss', 'public/assets/frontend/css');

mix.scripts('resources/assets/frontend/js/cart.js', 'public/assets/frontend/js/cart.js')


//================BACKEND=======================
mix.js('resources/assets/backend/js/backend.js', 'public/assets/backend/js/backend.js');

mix.sass('resources/assets/backend/sass/lte.scss', 'public/assets/backend/css/lte.css');

mix.copy('node_modules/overlayscrollbars/css', 'public/assets/plugins/overlayscrollbars/css');
mix.copy('node_modules/overlayscrollbars/js', 'public/assets/plugins/overlayscrollbars/js');

mix.scripts('resources/assets/backend/js/content_editor.js', 'public/assets/backend/js/content_editor.js');

mix.scripts('resources/assets/backend/js/common.js', 'public/assets/backend/js/common.js');
mix.scripts('resources/assets/backend/js/product_editor.js', 'public/assets/backend/js/product_editor.js');

mix.scripts('resources/assets/backend/js/post_editor.js', 'public/assets/backend/js/post_editor.js');

// Vue js
mix.js('resources/assets/backend/js/menu_management.js', 'public/assets/backend/js/menu_management.js');

if(mix.inProduction()){
    mix.version();
}
