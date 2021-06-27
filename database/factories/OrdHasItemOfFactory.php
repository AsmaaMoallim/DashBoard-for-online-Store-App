<?php

namespace Database\Factories;

use App\Models\OrdHasItemOf;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdHasItemOfFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrdHasItemOf::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'prod_ord_amount' => $this->faker->randomDigit(),
            'fakeID' => ++$fakeID,
        ];
    }
}
