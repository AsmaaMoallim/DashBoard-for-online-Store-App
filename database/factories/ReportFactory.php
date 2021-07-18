<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'cla_id' => $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'ignored' => $this->faker->boolean(50),
            'com_id' => $this->faker->randomElement(Comment::pluck('com_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
