<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        DB::table('manager')->delete();
        DB::table('permission')->delete();
        DB::table('position')->delete();
        static $fakeID = 0;
        static $pos_id = 0;

        return [
            'pos_id'=> ++$pos_id,
            "pos_name" => $this->faker->unique()->name,
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
