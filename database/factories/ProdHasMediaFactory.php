<?php

namespace Database\Factories;

use App\Models\MediaLibrary;
use App\Models\ProdHasMedia;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdHasMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProdHasMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'prod_id' => $this->faker->randomElement(Product::pluck('prod_id')->toArray()),
            'medl_id' => $this->faker->randomElement(MediaLibrary::pluck('medl_id')->toArray()),
            'fakeID'=> ++$fakeID,
        ];
    }
}
