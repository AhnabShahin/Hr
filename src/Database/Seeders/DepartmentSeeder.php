<?php

namespace Xpeedstudio\Hr\Database\Seeders;

use Illuminate\Database\Seeder;
use Xpeedstudio\Hr\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::factory(10)->create();
    }
}
