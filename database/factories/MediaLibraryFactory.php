<?php

namespace Database\Factories;

use App\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaLibraryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MediaLibrary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $medl_id=0;
        static $fakeID=0;
        return [
            'medl_id'=>++$medl_id,
            'medl_name' => $this->faker->firstName(),
            'medl_description'=>$this->faker->image(),
            'medl_img_ved'=>$this->faker->image(),
            'state' => $this->faker->boolean(50),
            'fakeID' => ++$fakeID,
        ];
    }
}
