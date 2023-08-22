<?php

namespace Xpeedstudio\hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xpeedstudio\hr\Models\Department;
use Xpeedstudio\hr\Models\Employee;
use Xpeedstudio\Hr\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name'        => $this->faker->firstName,
            'last_name'         => $this->faker->lastName,
            'email'             => $this->faker->unique()->safeEmail,
            'phone_number'      => $this->faker->phoneNumber,
            'hire_date'         => $this->faker->date,
            'salary'            => $this->faker->randomFloat(2, 30000, 90000),
            'commission_pct'    => $this->faker->randomFloat(2, 0, 1),
            'manager_id'        => null,
            'job_id'            => $this->faker->randomElement(Job::pluck('id')),
            'department_id'     => $this->faker->randomElement(Department::pluck('id')),
        ];
    }
}
