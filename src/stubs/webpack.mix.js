const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

mix.copy('resources/vendor', 'public/vendor')
    .copy('resources/images', 'public/images')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.js') ]
    })
    // .purgeCss()
    .sourceMaps()
    .version();