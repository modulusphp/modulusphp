const {mix} = require('laravel-mix');

mix.setPublicPath('./public');
mix.react('resources/js/app.js', './js')
   .sass('resources/sass/app.scss', './css')
   .version();