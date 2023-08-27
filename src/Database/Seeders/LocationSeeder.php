<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::factory(10)->create();
    }
}
