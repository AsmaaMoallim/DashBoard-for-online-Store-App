<?php

namespace Database\Factories;

use App\Models\measuresIndex;
use Illuminate\Database\Eloquent\Factories\Factory;

class measuresIndexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = measuresIndex::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;

        return [
            'mesu_index_name'=> $this->faker->name(),
            'mesu_index_img' =>$this->faker->image(),
            'state' => $this->faker->boolean(50),
            'fakeId'=> ++$fakeID,
        ];
    }
}
