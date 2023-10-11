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

mix.js([
        'resources/js/app.js',
        'resources/theme/js/select2.min.js',
        'resources/theme/js/custom.js',
        'resources/theme/js/plugins.js',
    ], 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css')
    .combine([
        'resources/theme/css/select2.min.css',
        'resources/theme/css/app.min.css',
        'resources/theme/css/custom.css',
    ], 'public/css/app.css')
    .version()
    .vue({
        version: 2
    });

// webpack.mix.js
const path = require('path');

mix.webpackConfig({
    resolve: {
        alias: {
            ziggy: path.resolve('vendor/tightenco/ziggy/dist'),
        },
    },
});


// mix.browserSync('electo.test');
