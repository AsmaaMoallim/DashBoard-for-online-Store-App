<?php

namespace Database\Factories;

use App\Models\PosInclude;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosIncludeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PosInclude::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'fakeID' => ++$fakeID,
        ];
    }
}
