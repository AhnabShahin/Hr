<?php

namespace Xpeedstudio\Hr\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Xpeedstudio\Hr\Commands\SeedHRTables;
use Illuminate\Console\Application;
use Xpeedstudio\Hr\Helpers\Helper;

class EmployeeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'xpeedstudio/hr');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->commands([
            SeedHRTables::class,
        ]);

        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('Helper', Helper::class);
        });
    }
}
