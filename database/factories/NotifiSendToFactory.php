<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Notification;
use App\Models\NotifiSendTo;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotifiSendToFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NotifiSendTo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'notifi_id' => $this->faker->randomElement(Notification::pluck('notifi_id')->toArray()),
            'cla_id' =>  $this->faker->randomElement(Client::pluck('cla_id')->toArray()),
            'fakeID' => ++$fakeID,
        ];
    }
}
