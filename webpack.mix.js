let mix = require('laravel-mix');

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
mix.scripts([
    'public/assets/global/plugins/respond.min.js',
    'public/assets/global/plugins/excanvas.min.js',
    'public/assets/global/plugins/ie8.fix.min.js',
    'public/assets/global/plugins/jquery.min.js',
    'public/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'public/assets/global/plugins/js.cookie.min.js',
    'public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'public/assets/global/plugins/jquery.blockui.min.js',
    'public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    'public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
    'public/assets/global/plugins/jquery.sparkline.min.js',
    'public/assets/global/plugins/toastr/toastr.min.js',
    'public/assets/global/scripts/app.min.js',
    'public/assets/pages/scripts/profile.min.js',
    'public/assets/layouts/layout/scripts/layout.min.js',
    'public/assets/layouts/layout/scripts/demo.min.js',
    'public/assets/layouts/global/scripts/quick-sidebar.min.js',
    'public/assets/layouts/global/scripts/quick-nav.min.js'
], 'public/js/app.js');

mix.styles([
    'public/assets/global/plugins/font-awesome/css/font-awesome.min.css',
    'public/assets/global/fonts/google-fonts.css',
    'public/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    'public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
    'public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
    'public/assets/global/plugins/toastr/toastr.min.css',
    'public/assets/global/css/components.min.css',
    'public/assets/global/css/plugins.min.css',
    'public/assets/pages/css/profile.min.css',
    'public/assets/layouts/layout/css/layout.min.css',
    'public/assets/layouts/layout/css/themes/darkblue.min.css',
    'public/assets/layouts/layout/css/custom.min.css'
], 'public/css/app.css')
    .copy('public/assets/global/plugins/font-awesome/fonts', 'public/fonts');