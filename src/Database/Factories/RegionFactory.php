<?php
namespace Xpeedstudio\hr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Xpeedstudio\hr\Models\Region;

class RegionFactory extends Factory
{
    protected $model = Region::class;

    protected static $namespace = 'Xpeedstudio\\hr\\Database\\Factories\\';

    public function definition()
    {
        return [
            'region_name' => $this->faker->word,
        ];
    }
    
}