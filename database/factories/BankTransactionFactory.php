<?php

namespace Database\Factories;

use App\Models\BankTransaction;
use App\Models\Client;
use App\Models\Order;
use App\Models\SysBankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BankTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        static $trans_id = 0;
        return [
            'trans_id' => ++$trans_id,
            'ord_id' => $this->faker->randomElement(Order::pluck('ord_id')->toArray()),
            'cla_id' =>  $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'sys_bank_id' =>  $this->faker->randomElement(SysBankAccount::pluck('sys_bank_id')->toArray()),
            'banktran_amount' => $this->faker->randomDigit,
            'banktran_img' => $this->faker->image(),
            'fakeID' => ++$fakeID,
        ];
    }
}
