<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\ManagerOperationsRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManagerOperationsRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManagerOperationsRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $fakeID =0 ;
        static $man_oper_record_id = 0;
        return [
            "man_oper_record_id" => ++$man_oper_record_id,
            'man_id'=> $this->faker->randomElement(Manager::pluck('man_id')->toArray()),
            'man_oper_date' =>$this->faker->date(),
            'man_oper_time' =>$this->faker->time(),
            'man_operation'=>$this->faker->name,
            'fakeID' => ++$fakeID
        ];
    }
}
