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
        static $fakeID = 0;

        return [
            'ord_number' => ++$ord_number,
            'cla_id' =>  $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'ord_date'=> $this->faker->date(),
            'pay_method_name'=>  $this->faker->randomElement(PaymentMethod::pluck('pay_method_name')->toArray()),
            'stage_name' =>  $this->faker->randomElement(Stage::pluck('stage_name')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
