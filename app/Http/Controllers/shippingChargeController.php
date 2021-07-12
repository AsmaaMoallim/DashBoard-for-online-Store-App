<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shippingChargeController extends Controller
{
    public function index()
    {
        $pagename = "تكلفة الشحن";

        $tables = 'shipping_charge';
        $columns= \DB::getSchemaBuilder()->getColumnListing('shipping_charge');
        $rows = \DB::table('shipping_charge')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables);
    }
}
