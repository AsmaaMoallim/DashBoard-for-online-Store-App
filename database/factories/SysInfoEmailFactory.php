<?php

namespace Database\Factories;

use App\Models\SysInfoEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SysInfoEmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SysInfoEmail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;
        return [
            'sys_email' => $this->faker->unique()->safeEmail(),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
