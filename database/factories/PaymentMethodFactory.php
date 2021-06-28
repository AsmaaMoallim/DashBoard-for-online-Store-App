<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID=0;
        static $payment_method_id=0;
        return [
            'payment_method_id' => ++$payment_method_id,
            'pay_method_name' => $this->faker->firstName,
            'fakeID'=> ++$fakeID,
        ];
    }
}
