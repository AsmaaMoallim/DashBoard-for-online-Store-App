<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\MediaLibrary;
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

        return [
            'notifi_title' => $this->faker->name,
            'notifi_content' => $this->faker->name,
            'man_id' => $this->faker->randomElement(Manager::pluck('man_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
