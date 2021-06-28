<?php

namespace Database\Factories;

use App\Models\MainSection;
use App\Models\MediaIbrary;
use App\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0;
        static $main_id =0;

        return [
            'main_id' => ++$main_id,
            'main_name' => $this->faker->name(),
            'medl_id' => $this->faker->randomElement(MediaLibrary::pluck('medl_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID' => ++$fakeID
        ];
    }
}
