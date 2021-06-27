<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        static $prod_id = 0;
        return [
            'prod_id' => ++$prod_id,
            'prod_name' =>$this->faker->firstName,
            'sub_name' =>$this->faker->randomElement(SubSection::pluck('sub_name')->toArray()),
            'prod_price' => $this->faker->century,
            'prod_avil_amount' => $this->faker->randomDigit,
            'prod_desc_img' => $this->faker->image(),
            'medl_id' => $this->faker->randomElement(MediaIbraryFactory::pluck('medl_id')->toArray()),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,
        ];
    }
}
