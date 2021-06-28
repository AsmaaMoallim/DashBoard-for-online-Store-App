<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0;
        static $com_id =0;
        return [
            'prod_id' => $this->faker->randomElement(Product::pluck('prod_id')->toArray()),
            'cla_id' => $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'com_id' => ++$com_id,
            'com_content' => $this->faker->randomLetter,
            'com_rateing' => $this->faker->randomDigit,
            'fakeID'=> ++$fakeID,
        ];
    }
}
