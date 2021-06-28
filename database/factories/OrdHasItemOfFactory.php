<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrdHasItemOf;
use App\Models\Product;
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
            'prod_id' => $this->faker->randomElement(Product::pluck('prod_id')->toArray()),
            'ord_id' => $this->faker->randomElement(Order::pluck('ord_id')->toArray()),
            'prod_ord_amount' => $this->faker->randomDigit(),
            'fakeID' => ++$fakeID,
        ];
    }
}
