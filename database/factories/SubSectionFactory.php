<?php

namespace Database\Factories;

use App\Models\MainSection;
use App\Models\SubSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'sub_name'=>$this->faker->name,
            'main_name'=>$this->faker->randomElement(MainSection::pluck('main_name')->toArray()),
            'medl_id' => $this->faker->randomElement(MediaIbraryFactory::pluck('medl_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
