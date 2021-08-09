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

mix.js('resources/js/app.js', 'public/js')
    .script([
        'assets/js/vendor-all.min.js',
        'assets/js/plugins/bootstrap.min.js',
        'assets/js/ripple.js',
        'assets/js/pcoded.min.js',
        'assets/js/menu-setting.min.js',
    ],'public/js/all.js')
    .script([
        'assets/js/plugins/apexcharts.min.js',
        'assets/js/pages/dashboard-main.js',
    ],'public/js/dashboard.js')
    .sourceMaps();
