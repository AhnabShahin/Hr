<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        Region::factory(10)->create();
    }
}
