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

        $qry =\DB::table('shipping_charge')
            ->select('shipping_charge.ship_price AS التكلفة','shipping_charge.fakeId')
            ->get();
        $columns = ['التكلفة','fakeId'];

        return view('master_tables_view')->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }
}
