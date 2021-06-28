<?php

namespace Database\Factories;

use App\Models\Measure;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Measure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        static $mesu_id = 0;

        return [
            'mesu_id'=> ++$mesu_id,
            'mesu_value' => $this->faker->randomAscii,
            'fakeID'=> ++$fakeID,
        ];
    }
}
