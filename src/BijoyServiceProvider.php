<?php

namespace Vpsoft\Bijoy;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class BijoyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('bijoy', function($command) {
            $command->info('Generating bijoy preset...');

            Preset::install();

            $command->info('All done! Now please run "npm install && npm run dev" to compile your assets.');
        });
    }
}
