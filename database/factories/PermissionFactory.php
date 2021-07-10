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
            'per_name'=> $this->randomelemnt(['التعامل مع الادارة', 'التعامل مع الصلاحيات والمناصب', 'التعالمل مع مكتبة الصور والفيديوهات',
                'التعامل مع البانارات','التعامل مع الاقسام الرئيسية والفرعية','التعامل مع المنتجات','التعامل مع العملاء','التعامل مع دليل المقاسات',
                'التعامل مع بيانات التواصل','التعامل مع روابط التواصل','التعامل مع تكلفة الشحن','التعامل مع الحسابات البنكية',
                'التعامل مع التحويلات البنكية','التعامل مع التعليقات','التعامل مع الاشعارات','التعامل مع البريد']),
            'state' => $this->faker->boolean(50),
            'fakeID'=> ++$fakeID,

        ];
    }
}
