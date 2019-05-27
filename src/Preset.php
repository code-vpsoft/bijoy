<?php

namespace Vpsoft\Bijoy;

use Illuminate\Foundation\Console\Presets\Preset as ConsolePreset;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class Preset extends ConsolePreset
{
    public static function install()
    {
        static::updateSassDirectory();

        static::updateJsDirectory();

        static::updateImageDirectory();

        static::updateVendorDirectory();

        static::updateLayoutDirectory();

        static::updateAdminDirectory();

        static::updatePackages();

        static::updateMix();

        static::updateTailwindJs();

        static::copyRepoList();
    }

    public static function updateSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));

        File::copyDirectory(__DIR__.'/stubs/sass', resource_path('sass'));
    }

    public static function updateJsDirectory()
    {
        File::cleanDirectory(resource_path('js'));

        File::copyDirectory(__DIR__.'/stubs/js', resource_path('js'));
    }

    public static function updateImageDirectory()
    {
        File::copyDirectory(__DIR__.'/stubs/images', resource_path('images'));
    }

    public static function updateVendorDirectory()
    {
        File::cleanDirectory(resource_path('vendor'));

        File::copyDirectory(__DIR__.'/stubs/vendor', resource_path('vendor'));
    }

    public static function updateLayoutDirectory()
    {
        File::cleanDirectory(resource_path('views/layouts'));

        File::copyDirectory(__DIR__.'/stubs/layouts', resource_path('views/layouts'));
    }

    public static function updateAdminDirectory()
    {
        File::cleanDirectory(resource_path('views/admin'));

        File::copyDirectory(__DIR__.'/stubs/admin', resource_path('views/admin'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                "js-cookie" => "^2.2.0",
                "simplebar" => "^4.0.0-alpha.7",
                "tailwindcss" => "^0.7.4",
                "tailwindcss-plugins" => "^0.1.4",
                "tooltip.js" => "^1.3.2",
                "v-click-outside" => "^2.1.1",
                "vue-template-compiler" => "^2.6.10",
                "swiper" => "^4.5.0"
            ],
            Arr::except($packages, [
                'bootstrap',
                'jquery',
                'popper.js'
            ])
        );
    }

    public static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateTailwindJs()
    {
        copy(__DIR__.'/stubs/tailwind.js', base_path('tailwind.js'));
        copy(__DIR__.'/stubs/tailwind-admin.js', base_path('tailwind-admin.js'));
    }

    public static function copyRepoList()
    {
        copy(__DIR__.'/stubs/list-of-useful-repos.md', base_path('list-of-useful-repos.md'));
    }

}