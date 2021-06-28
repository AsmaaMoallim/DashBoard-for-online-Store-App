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
        static $report_id = 0;
        return [
            'report_id' => ++$report_id,
            'prod_id' => $this->faker->randomElement(Product::pluck('prod_id')->toArray()),
            'cla_id' => $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'com_id' => $this->faker->randomElement(Comment::pluck('com_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
