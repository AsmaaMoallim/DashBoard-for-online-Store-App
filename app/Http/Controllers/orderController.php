<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $recordPage = "order_details";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "عرض";
        $tables = 'orders';
        $columns= DB::getSchemaBuilder()->getColumnListing('orders');
        $rows = DB::table('orders')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }
}
