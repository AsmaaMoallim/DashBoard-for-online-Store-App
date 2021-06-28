<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $ord_number = 0;
        static $ord_id = 0;
        static $fakeID = 0;

        return [
            'ord_id' => ++$ord_id,
            'ord_number' => ++$ord_number,
            'cla_id' =>  $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'ord_date'=> $this->faker->date(),
            'payment_method_id'=>  $this->faker->randomElement(PaymentMethod::pluck('payment_method_id')->toArray()),
            'stage_id' =>  $this->faker->randomElement(Stage::pluck('stage_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
