<?php
namespace Xpeedstudio\hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xpeedstudio\hr\Models\Country;
use Xpeedstudio\Hr\Models\Region;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public static $namespace = 'Xpeedstudio\\hr\\Database\\Factories\\';

    public function definition()
    {
        return [
            'country_name' => $this->faker->word,
            'region_id' => $this->faker->randomElement(Region::pluck('_id')),
        ];
    }
    
}