<?php

namespace Database\Factories;

use App\Models\FlightCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FlightCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name'=>$this->faker->name(),
            'image'=>"index.jpg",
            'flight'=>rand(10,20),
        ];
    }
}
