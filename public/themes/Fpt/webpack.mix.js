let mix = require('laravel-mix');

mix.js(`${__dirname}/resources/assets/admin/js/main.js`, `${__dirname}/assets/admin/js/fpt.js`)
.sass(`${__dirname}/resources/assets/admin/sass/main.scss`, `${__dirname}/assets/admin/css/fpt.css`)
