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

if(mix.inProduction()){
    mix.version();
}
