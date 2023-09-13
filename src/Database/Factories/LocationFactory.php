<?php
namespace Xpeedstudio\hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xpeedstudio\Hr\Models\Country;
use Xpeedstudio\hr\Models\Location;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public static $namespace = 'Xpeedstudio\\hr\\Database\\Factories\\';

    public function definition()
    {
        return [
            'street_address' => $this->faker->streetAddress,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'state_province' => $this->faker->state,
            'country_id' => $this->faker->randomElement(Country::pluck('_id')),
        ];
    }
    
}