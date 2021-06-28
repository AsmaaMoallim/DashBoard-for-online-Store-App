<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        DB::table('manager')->delete();
        static $man_id= 0;
        static $fakeID = 0;
        return [

            'man_id' => ++$man_id,
            'man_frist_name' => $this->faker->firstName(),
            'man_last_name' => $this->faker->name(),
            'man_phone_num' => $this->faker->phoneNumber,
            'man_email' => $this->faker->unique()->safeEmail(),
            'man_password' => $this->faker->randomDigit(),
            'pos_id' => $this->faker->randomElement(Position::pluck('pos_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID' => ++$fakeID,

        ];
    }

}
