<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Permission;
use App\Models\PosInclude;
use App\Models\Position;
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
            'pos_id' => $this->faker->randomElement(Position::pluck('pos_id')->toArray()),
            'per_id'=> $this->faker->randomElement(Permission::pluck('per_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
