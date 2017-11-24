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

 /* CSS DA APLICAÇÂO */
mix.sass('resources/assets/sass/app.scss', 'public/assets/css').options({
    processCssUrls: false
}).version();

/* CSS DE FONTES */
mix.styles([
    'bower_components/font-awesome/css/font-awesome.min.css',
    'bower_components/Ionicons/css/ionicons.min.css',
], 'public/assets/css/fonts.min.css').version();

/* CSS DO BOOTSTRAP */
mix.copy('bower_components/bootstrap/dist/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css').version();

/* CSS DO TEMPLATE */
mix.styles([
    'resources/assets/AdminLTE/dist/css/alt/AdminLTE-without-plugins.min.css',
    'resources/assets/AdminLTE/dist/css/skins/skin-blue.min.css',
], 'public/assets/css/AdminLTE.min.css').version();

/* IMAGES */
mix.copyDirectory('resources/assets/images', 'public/assets/images');

/* FONTS */
mix.copyDirectory('bower_components/font-awesome/fonts', 'public/assets/fonts');
mix.copyDirectory('bower_components/Ionicons/fonts', 'public/assets/fonts');

/* JS DA APLICAÇÃO */
mix.scripts([
    'resources/assets/js/app.js'
], 'public/assets/js/app.min.js').version();

/* JS DO BOOTSTRAP */
mix.scripts([
    'bower_components/bootstrap/dist/js/bootstrap.min.js',
    'bower_components/popper.js/dist/popper.min.js'
], 'public/assets/js/bootstrap.min.js').version();

/* JS DO JQUERY */
mix.scripts([
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/jquery-mask-plugin/dist/jquery.mask.min.js',
], 'public/assets/js/jquery.min.js').version();

/* JS DO TEMPLATE */
mix.scripts([
    'resources/assets/AdminLTE/dist/js/adminlte.min.js'
], 'public/assets/js/adminlte.min.js').version();