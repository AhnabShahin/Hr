<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\JobHistory;

class JobHistorySeeder extends Seeder
{
    public function run()
    {
        JobHistory::factory(10)->create();
    }
}
