<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ShippingCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingChargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingCharge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;
        return [
            'ship_price' => $this->faker->randomDigit(),
            'fakeID'=> ++$fakeID,
        ];
    }
}
