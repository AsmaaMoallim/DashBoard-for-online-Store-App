<?php

namespace Database\Factories;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        static $stage_id = 0;
        return [
            'stage_id' => ++$stage_id,
            'stage_name' => $this->faker->randomElement(['submitted', 'shipped', 'processing']),
            'fakeID'=> ++$fakeID,
        ];
    }
}
