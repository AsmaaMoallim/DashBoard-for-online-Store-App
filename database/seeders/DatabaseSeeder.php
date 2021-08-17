<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DatabaseSeeder::emptyData();


//        \App\Models\Position::factory(10)->create();
//        \App\Models\Permission::factory(16)->create();
//        \App\Models\Manager::factory(10)->create();
//        \App\Models\Stage::factory(10)->create();
//        \App\Models\PosInclude::factory(10)->create();


        DatabaseSeeder::main_insertion();

        \App\Models\measuresIndex::factory(10)->create();
        \App\Models\Measure::factory(10)->create();
        \App\Models\MediaLibrary::factory(10)->create();
        \App\Models\MainSection::factory(10)->create();
        \App\Models\SubSection::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\Banner::factory(10)->create();
        \App\Models\PaymentMethod::factory(10)->create();
        \App\Models\Notification::factory(10)->create();
        \App\Models\ShippingCharge::factory(10)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Report::factory(10)->create();
        \App\Models\SysInfoEmail::factory(10)->create();
        \App\Models\SysBankAccount::factory(10)->create();
        \App\Models\SysInfoPhone::factory(10)->create();
        \App\Models\EmailBox::factory(18)->create();
        \App\Models\BankTransaction::factory(10)->create();
        \App\Models\SocialMediaLink::factory(10)->create();
        \App\Models\ProductProdAvilColor::factory(10)->create();




//        \App\Models\ProdAvilIn::factory(10)->create();
//        \App\Models\OrdHasItemOf::factory(10)->create();
//        \App\Models\ProdHasMedia::factory(10)->create();
//



//        \App\Models\ManagerOperationsRecord::factory(10)->create();


    }

    public function emptyData()
    {
//        DB::table('ord_has_item_of')->delete();
//        DB::table('notifi_send_to')->delete();
//        DB::table('pos_include')->delete();
//        DB::table('prod_avil_in')->delete();
//        DB::table('product_prod_avil_color')->delete();
//        DB::table('social_media_link')->delete();
//        DB::table('manager_operations_record')->delete();
//        DB::table('bank_transaction')->delete();
//        DB::table('email_box')->delete();
//        DB::table('sys_info_phone')->delete();
//        DB::table('sys_bank_account')->delete();
//        DB::table('sys_info_email')->delete();
//        DB::table('report')->delete();
//        DB::table('shipping_charge')->delete();
//        DB::table('comments')->delete();
//        DB::table('orders')->delete();
//        DB::table('stage')->delete();
//        DB::table('notifications')->delete();
//        DB::table('payment_method')->delete();
//        DB::table('banner')->delete();
//        DB::table('clients')->delete();
//        DB::table('product')->delete();
//        DB::table('sub_section')->delete();
//        DB::table('main_sections')->delete();
//        DB::table('media_library')->delete();
//        DB::table('measure')->delete();
//        DB::table('manager')->delete();
//        DB::table('permission')->delete();
//        DB::table('position')->delete();

    }

    public function main_insertion()
    {

        DB::table('stage')->insert([
            ['stage_name' => 'تم التسليم', 'fakeId' => '1'],
            ['stage_name' => 'قيد التجهيز', 'fakeId' => '2'],
            ['stage_name' => 'تم الشحن', 'fakeId' => '3']
        ]);

        DB::table('position')->insert([
            ['pos_name' => 'Admin', 'fakeId' => '1' , 'state' => '1']
        ]);

        DB::table('permission')->insert([
            ['per_name' => 'التعامل مع الادارة', 'fakeId' => '1'],
            ['per_name' => 'التعامل مع الصلاحيات والمناصب', 'fakeId' => '2'],
            ['per_name' => 'التعالمل مع مكتبة الصور والفيديوهات', 'fakeId' => '3'],
            ['per_name' => 'التعامل مع البانارات', 'fakeId' => '4'],
            ['per_name' => 'التعامل مع الاقسام الرئيسية والفرعية', 'fakeId' => '5'],
            ['per_name' => 'التعامل مع المنتجات', 'fakeId' => '6'],
            ['per_name' => 'التعامل مع العملاء', 'fakeId' => '7'],
            ['per_name' => 'التعامل مع دليل المقاسات', 'fakeId' => '8'],
            ['per_name' => 'التعامل مع بيانات التواصل', 'fakeId' => '9'],
            ['per_name' => 'التعامل مع روابط التواصل', 'fakeId' => '10'],
            ['per_name' => 'التعامل مع تكلفة الشحن', 'fakeId' => '11'],
            ['per_name' => 'التعامل مع الحسابات البنكية', 'fakeId' => '12'],
            ['per_name' => 'التعامل مع التحويلات البنكية', 'fakeId' => '13'],
            ['per_name' => 'التعامل مع التعليقات', 'fakeId' => '14'],
            ['per_name' => 'التعامل مع الاشعارات', 'fakeId' => '15'],
            ['per_name' => 'التعامل مع البريد', 'fakeId' => '16'],
            ['per_name' => 'التعامل مع الطلبات', 'fakeId' => '17'],
        ]);

        DB::table('pos_include')->insert([
            ['pos_id' => '1', 'per_id'=> '1','fakeId' => '1'],
            ['pos_id' => '1', 'per_id'=> '2','fakeId' => '2'],
            ['pos_id' => '1', 'per_id'=> '3','fakeId' => '3'],
            ['pos_id' => '1', 'per_id'=> '4','fakeId' => '4'],
            ['pos_id' => '1', 'per_id'=> '5','fakeId' => '5'],
            ['pos_id' => '1', 'per_id'=> '6','fakeId' => '6'],
            ['pos_id' => '1', 'per_id'=> '7','fakeId' => '7'],
            ['pos_id' => '1', 'per_id'=> '8','fakeId' => '8'],
            ['pos_id' => '1', 'per_id'=> '9','fakeId' => '9'],
            ['pos_id' => '1', 'per_id'=> '10','fakeId' => '10'],
            ['pos_id' => '1', 'per_id'=> '11','fakeId' => '11'],
            ['pos_id' => '1', 'per_id'=> '12','fakeId' => '12'],
            ['pos_id' => '1', 'per_id'=> '13','fakeId' => '13'],
            ['pos_id' => '1', 'per_id'=> '14','fakeId' => '14'],
            ['pos_id' => '1', 'per_id'=> '15','fakeId' => '15'],
            ['pos_id' => '1', 'per_id'=> '16','fakeId' => '16'],
            ['pos_id' => '1', 'per_id'=> '17','fakeId' => '17'],
        ]);

        DB::table('manager')->insert([
            ['man_frist_name' => 'Admin', 'man_last_name' => 'admin' , 'man_phone_num' => '055555555',
                'man_email' => 'Admin@admin.com', 'man_password' => Hash::make('AdminPass') ,
                'pos_id' => '1', 'state' => '1' , 'fakeId' => '1'],
        ]);

    }
}

