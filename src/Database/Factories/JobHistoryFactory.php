<?php

namespace Xpeedstudio\hr\Database\Factories;

use Xpeedstudio\Hr\Models\Job;
use Xpeedstudio\Hr\Models\Employee;
use Xpeedstudio\Hr\Models\Department;
use Xpeedstudio\Hr\Models\JobHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobHistoryFactory extends Factory
{
    protected $model = JobHistory::class;

    protected static $namespace = 'Xpeedstudio\\hr\\Database\\Factories\\';

    public function definition()
    {
        return [
            'end_date'      => $this->faker->date,
            'start_date'    => $this->faker->date,
            'job_id'        => $this->faker->randomElement(Job::pluck('_id')),
            'employee_id'   => $this->faker->randomElement(Employee::pluck('_id')),
            'department_id' => $this->faker->randomElement(Department::pluck('_id')),
        ];
    }
}
