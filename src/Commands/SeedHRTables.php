<?php

namespace Xpeedstudio\Hr\Commands;

use Illuminate\Console\Command;
use Xpeedstudio\Hr\Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
class SeedHRTables extends Command
{
    protected $signature = 'hr:seed';

    protected $description = 'Seed all tables of HR packages';

    public function handle()
    {
        
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Xpeedstudio\\Hr\\Database\\Factories\\'.class_basename($modelName).'Factory';
        });
        
        $this->call(DatabaseSeeder::class);
        $this->info('Tables of HR packages seeded successfully.');
    }
}
