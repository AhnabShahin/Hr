<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::factory()->times(10)->create();
    }
}
