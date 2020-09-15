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

//================BACKEND=======================
mix.js('resources/assets/backend/js/backend.js', 'public/assets/backend/js/backend.js');

mix.sass('resources/assets/backend/sass/lte.scss', 'public/assets/backend/css/lte.scss');

mix.copy('node_modules/overlayscrollbars/css', 'public/assets/plugins/overlayscrollbars/css');
mix.copy('node_modules/overlayscrollbars/js', 'public/assets/plugins/overlayscrollbars/js');

mix.scripts('resources/assets/backend/js/common.js', 'public/assets/backend/js/common.js');

if(mix.inProduction()){
    mix.version();
}
