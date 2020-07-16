const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/welcome.js', 'public/js')
    .js('resources/js/item.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/static/static.scss', 'public/css')
    .sass('resources/sass/app/app.scss', 'public/css')
    .sass('resources/sass/news/news.scss', 'public/css')
    .sass('resources/sass/welcome/welcome.scss', 'public/css')
    .sass('resources/sass/shop/catalog.scss', 'public/css')
    .sass('resources/sass/shop/item.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css');
