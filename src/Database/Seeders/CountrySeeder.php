<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Country::factory(10)->create();
    }
}
