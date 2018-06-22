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

mix.extract(['bootstrap', 'jquery']);

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');



mix.styles([
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/gsdk.css',
    'resources/assets/css/demo.css',
    'resources/assets/css/font-awesome.css'
], 'public/css/homepage.css');

mix.scripts([
    'resources/assets/js/jquery-ui-1.10.4.custom.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/gsdk-checkbox.js',
    'resources/assets/js/gsdk-radio.js',
    'resources/assets/js/gsdk-bootstrapswitch.js',
    'resources/assets/js/get-shit-done.js',
    'resources/assets/js/custom.js',
    'resources/assets/js/popper.js'
], 'public/js/homepage.js')
    .sourceMaps();

mix.styles([
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/animate.css',
    'resources/assets/css/hamburgers.min.css',
    'resources/assets/css/select2.min.css',
    'resources/assets/css/util.css',
    'resources/assets/css/main.css'
], 'public/css/login.css');


mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/select2.min.js',
    'resources/assets/js/tilt.jquery.min.js',
    'resources/assets/js/popper.js',
    'resources/assets/js/main.js'
], 'public/js/login.js')
    .sourceMaps();


mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/gestao/jquery-ui.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/gestao/raphael.min.js',
    'resources/assets/js/gestao/morris.min.js',
    'resources/assets/js/gestao/jquery.knob.min.js',
    'resources/assets/js/gestao/moment.min.js',
    'resources/assets/js/gestao/daterangepicker.js',
    'resources/assets/js/gestao/bootstrap-datepicker.min.js',
    'resources/assets/js/gestao/jquery.slimscroll.min.js',
    'resources/assets/js/gestao/fastclick.js',
    'resources/assets/js/gestao/adminlte.min.js',
    'resources/assets/js/dashboard.js',
    'resources/assets/js/popper.js',
    'resources/assets/js/gestao/demo.js'
], 'public/js/gestao.js');


mix.styles([
    'resources/assets/css/gestao/bootstrap.min.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/gestao/ionicons.min.css',
    'resources/assets/css/gestao/AdminLTE.min.css',
    'resources/assets/css/gestao/skins/_all-skins.min.css',
    'resources/assets/css/gestao/morris.css',
    'resources/assets/css/gestao/jquery-jvectormap.css',
    'resources/assets/css/gestao/bootstrap-datepicker.min.css',
    'resources/assets/css/gestao/daterangepicker.css',
], 'public/css/gestao.css');





