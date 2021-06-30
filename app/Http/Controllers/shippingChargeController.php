<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shippingChargeController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "0";
        $tables = 'shipping_charge';
        $columns= \DB::getSchemaBuilder()->getColumnListing('shipping_charge');
        $rows = \DB::table('shipping_charge')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }
}
