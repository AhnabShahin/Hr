<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Job;

class JobSeeder extends Seeder
{
    public function run()
    {
        Job::factory(10)->create();
    }
}
