<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\MediaIbrary;
use App\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;

        return [
            'ban_name' =>$this->faker->name,
            'medl_id' => $this->faker->randomElement(MediaLibrary::pluck('medl_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID' => ++$fakeID
        ];
    }
}
