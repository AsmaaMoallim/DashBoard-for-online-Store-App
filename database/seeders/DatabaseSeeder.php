<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
//
//        \App\Models\Position::factory(10)->create();
//        \App\Models\Permission::factory(10)->create();
//        \App\Models\Manager::factory(10)->create();
//        \App\Models\Measure::factory(10)->create();
//        \App\Models\MediaLibrary::factory(10)->create();
//        \App\Models\MainSection::factory(10)->create();
//        \App\Models\SubSection::factory(10)->create();
//        \App\Models\Product::factory(10)->create();
//        \App\Models\Client::factory(10)->create();
//        \App\Models\Banner::factory(10)->create();
//        \App\Models\PaymentMethod::factory(10)->create();
//        \App\Models\Notification::factory(10)->create();
//        \App\Models\Stage::factory(10)->create();
//        \App\Models\Order::factory(10)->create();
//        \App\Models\Comment::factory(10)->create();
//        \App\Models\ShippingCharge::factory(10)->create();
////        \App\Models\Report::factory(10)->create();
//        \App\Models\SysInfoEmail::factory(10)->create();
//        \App\Models\SysBankAccount::factory(10)->create();
//        \App\Models\SysInfoPhone::factory(10)->create();
//        \App\Models\EmailBox::factory(4)->create();
//        \App\Models\BankTransaction::factory(10)->create();
        \App\Models\ManagerOperationsRecord::factory(10)->create();
//        \App\Models\SocialMediaLink::factory(10)->create();
//        \App\Models\ProductProdAvilColor::factory(10)->create();
////        \App\Models\ProdAvilIn::factory(10)->create();
////        \App\Models\PosInclude::factory(10)->create();
//        \App\Models\NotifiSendTo::factory(10)->create();
////        \App\Models\OrdHasItemOf::factory(10)->create();
////        \App\Models\IgnoredReport::factory(10)->create();
////        \App\Models\User::factory(10)->create();

    }
    public function emptyData(){
//        DB::table('ignored_reports')->delete();
//        DB::table('ord_has_item_of')->delete();
        DB::table('notifi_send_to')->delete();
//        DB::table('pos_include')->delete();
//        DB::table('prod_avil_in')->delete();
        DB::table('product_prod_avil_color')->delete();
        DB::table('social_media_link')->delete();
        DB::table('manager_operations_record')->delete();
        DB::table('bank_transaction')->delete();
        DB::table('email_box')->delete();
        DB::table('sys_info_phone')->delete();
        DB::table('sys_bank_account')->delete();
        DB::table('sys_info_email')->delete();
//        DB::table('report')->delete();
        DB::table('shipping_charge')->delete();
        DB::table('comments')->delete();
        DB::table('orders')->delete();
        DB::table('stage')->delete();
        DB::table('notifications')->delete();
        DB::table('payment_method')->delete();
        DB::table('banner')->delete();
        DB::table('clients')->delete();
        DB::table('product')->delete();
        DB::table('sub_section')->delete();
        DB::table('main_sections')->delete();
        DB::table('media_library')->delete();
        DB::table('measure')->delete();
        DB::table('manager')->delete();
        DB::table('permission')->delete();
        DB::table('position')->delete();

    }
}
