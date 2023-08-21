<?php

namespace Xpeedstudio\Hr\Providers;


use Illuminate\Support\ServiceProvider;
use Xpeedstudio\Hr\Commands\SeedHRTables;

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
        $this->loadViewsFrom(__DIR__ . '/../views', 'xpeedstudio/hr');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SeedHRTables::class,
            ]);
        }
    }

}