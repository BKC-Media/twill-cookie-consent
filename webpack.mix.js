const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();

mix.js('resources/js/package.js', 'build')
    .sass('resources/scss/package.scss', 'build')
    .setPublicPath(__dirname)
    .options({
        postCss: [
            tailwindcss(),
            autoprefixer(),
        ]
    });