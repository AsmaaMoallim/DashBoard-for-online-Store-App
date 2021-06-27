<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        static $notifi_id = 0;

        return [
            'notifi_id' => ++$notifi_id,
            'notifi_title' => $this->faker->name,
            'notifi_content' => $this->faker->name,
            'medl_id' => $this->faker->randomElement(MediaIbraryFactory::pluck('medl_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
