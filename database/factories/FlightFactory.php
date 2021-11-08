<?php

namespace Database\Factories;

use App\Models\Flight;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title=$this->faker->name();
        return [
            'name' =>$title ,
            'admin_id'=>rand(1,10),
            'cat_id'=>rand(1,10),
            'description' => $this->faker->paragraph(),
            'views' =>rand(1,10),
            'departure'=>new DateTime(),
            'arrival'=>new DateTime(),
            'seats'=>rand(100,400),
            'image'=>"https://media.istockphoto.com/photos/boeing-737800-passenger-jet-picture-id92042438?b=1&k=20&m=92042438&s=170667a&w=0&h=ETrPLjXRmXnW0kBhXQgC2u_FybNBiK1hHr7e0uAU3aQ=",
            "slug"=>Str::slug($title)
        ];
    }
}
