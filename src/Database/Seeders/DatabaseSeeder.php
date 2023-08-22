<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RegionSeeder::class,
            CountrySeeder::class,
            LocationSeeder::class,
            JobSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            JobHistorySeeder::class
        ]);
    }
}
