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
    'node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css',
    'node_modules/ionicons/dist/css/ionicons.min.css',
], 'public/assets/css/fonts.min.css').version();

/* CSS DO BOOTSTRAP */
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css').version();

/* CSS DO TEMPLATE */
mix.styles([
    'resources/assets/AdminLTE/dist/css/alt/AdminLTE-without-plugins.min.css',
    'resources/assets/AdminLTE/dist/css/skins/skin-blue.min.css',
    'node_modules/select2/dist/css/select2.min.css',
    'resources/assets/AdminLTE/dist/css/alt/AdminLTE-select2.css',
], 'public/assets/css/AdminLTE.min.css').version();

/* IMAGES */
mix.copyDirectory('resources/assets/images', 'public/assets/images')
    .copyDirectory('resources/assets/AdminLTE/dist/img', 'public/assets/images');

/* FONTS */
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/fonts');
mix.copyDirectory('node_modules/ionicons/dist/fonts', 'public/assets/fonts');

/* JS DA APLICAÇÃO */
mix.scripts([
    'resources/assets/js/app.js',
    'resources/assets/js/app/ajax.js',
    'resources/assets/js/app/bootstrap.js',
    'resources/assets/js/app/menu.js',
    'resources/assets/js/app/preloader.js',
    'resources/assets/js/app/search.js',
    'resources/assets/js/app/utils.js',
    'resources/assets/js/app/ajax/event.js',
    'resources/assets/js/bind/data/mask-format.js',
    'resources/assets/js/bind/data/search.js',
    'resources/assets/js/bind/data/ajax/modal.js',
    'resources/assets/js/bind/data/ajax/form/checkbox.js',
    'resources/assets/js/bind/data/form/password.js',
], 'public/assets/js/app.min.js').version();

/* JS DO BOOTSTRAP */
mix.scripts([
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'
], 'public/assets/js/bootstrap.min.js').version();

/* JS DO JQUERY */
mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
], 'public/assets/js/jquery.min.js').version();

/* JS DO TEMPLATE */
mix.scripts([
    'resources/assets/AdminLTE/dist/js/adminlte.min.js',
    'node_modules/select2/dist/js/select2.js'
], 'public/assets/js/adminlte.min.js').version();