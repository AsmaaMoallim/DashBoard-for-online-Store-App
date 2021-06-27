<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID = 0;
        return [
            'per_name'=> $this->faker->name,
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,

        ];
    }
}
