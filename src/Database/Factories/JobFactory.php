<?php
namespace Xpeedstudio\hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Xpeedstudio\Hr\Models\Job;

class JobFactory extends Factory
{
    protected $model = Job::class;

    protected static $namespace = 'Xpeedstudio\\hr\\Database\\Factories\\';

    public function definition()
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'min_salary' => $this->faker->numberBetween(30000, 60000),
            'max_salary' => $this->faker->numberBetween(60001, 90000),
        ];
    }
    
}