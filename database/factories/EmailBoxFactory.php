<?php

namespace Database\Factories;

use App\Models\EmailBox;
use App\Models\SysInfoEmail;
use http\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailBoxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmailBox::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;

        return [
            'sys_email_id' => $this->faker->randomElement(SysInfoEmail::pluck('sys_email_id')),
            'email_cla_name' =>$this->faker->randomElement(\App\Models\Client::pluck('cla_frist_name')->toArray()),
            'email_cla_email' =>$this->faker->randomElement(\App\Models\Client::pluck('cla_email')->toArray()),
            'email_cla_phone' =>$this->faker->randomElement(\App\Models\Client::pluck('cla_phone_num')->toArray()),
            'email_type' =>$this->faker->name,
            'fakeID' => ++$fakeID,
        ];
    }
}
