<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //$table->string("header_name");
            // $table->string("fb_icon");
            // $table->string("tw_icon");
            // $table->string("ig_icon");
            // $table->string("wt_icon");
            // $table->string("footer_name");
            // $table->string("footer_desc");

            // 'header_name'=>"AirBlue",
            // 'fb_icon'=>""
            
        ];
    }
}
