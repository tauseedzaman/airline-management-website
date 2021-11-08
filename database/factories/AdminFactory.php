<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->name(),
            'lname' => $this->faker->name(),
            'username' => $this->faker->name()."123",
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => rand(),
            'password' => Hash::make('123'), 
            'image'=>"index.jpg",
            'roll'=>rand(0,1),
            'remember_token' => Str::random(10),
        ];
    }
}
