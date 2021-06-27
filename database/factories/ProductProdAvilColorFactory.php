<?php

namespace Database\Factories;

use App\Models\ProductProdAvilColor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductProdAvilColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductProdAvilColor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'fakeID' => ++$fakeID,
        ];
    }
}
