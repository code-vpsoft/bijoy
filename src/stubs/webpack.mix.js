const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

mix.copy('resources/vendor', 'public/vendor')
    .copy('resources/images', 'public/images')
    .js('resources/js/app.js', 'public/js')
    .sass(
        'resources/sass/app.scss',
        'public/css',
        {},
        [ tailwindcss('./tailwind.js') ]
    )
    .options({
        processCssUrls: false
    });

mix.js('resources/js/app-admin.js', 'public/js')
    .sass(
        'resources/sass/app-admin.scss',
        'public/css',
        {},
        [ tailwindcss('./tailwind-admin.js') ] // postcss plugins
    )
    .options({
        processCssUrls: false
    });

if (! mix.inProduction()) {
    mix.sourceMaps();
    mix.version();
}

if(mix.inProduction()) {
    // mix.purgeCss();
}