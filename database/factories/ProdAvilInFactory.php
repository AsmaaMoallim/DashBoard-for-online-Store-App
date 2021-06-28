<?php

namespace Database\Factories;

use App\Models\Measure;
use App\Models\ProdAvilIn;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdAvilInFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProdAvilIn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'mesu_id' => $this->faker->randomElement(Measure::pluck('mesu_id')->toArray()),
            'prod_id' => $this->faker->randomElement(Product::pluck('prod_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
