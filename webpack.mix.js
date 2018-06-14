const {mix} = require('laravel-mix');

mix.setPublicPath(path.resolve('./'));
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version()