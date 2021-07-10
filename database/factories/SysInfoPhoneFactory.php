<?php

namespace Database\Factories;

use App\Models\SysInfoPhone;
use Illuminate\Database\Eloquent\Factories\Factory;

class SysInfoPhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SysInfoPhone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;
        return [
            'sys_phone_num' => $this->faker->phoneNumber,
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
