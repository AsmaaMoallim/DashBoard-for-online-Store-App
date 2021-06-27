<?php

namespace Database\Factories;

use App\Models\BankTransaction;
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
        return [
            'banktran_amount' => $this->faker->randomDigit,
            'banktran_img' => $this->faker->image(),

            'fakeID' => ++$fakeID,
        ];
    }
}
