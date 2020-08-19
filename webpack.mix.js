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

mix.js('resources/admin-assets/js/app.js', 'public/admins/js').minify('public/admins/js/app-admin.js')
    .sass('resources/admin-assets/sass/app.scss', 'public/admins/css').minify('public/admins/css/app-admin.css')
    .copyDirectory('resources/frontend/img', 'public/img')
    .copyDirectory('resources/frontend/fonts', 'public/fonts')

if (mix.inProduction()) {
    mix.version();
}

