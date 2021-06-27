<?php

namespace Database\Factories;

use App\Models\SysBankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class SysBankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SysBankAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;
        return [
            'sys_bank_account_num' => $this->faker->randomDigit,
            'sys_bank_name'=>$this->faker->name,
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
