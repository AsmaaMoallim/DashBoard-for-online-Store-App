<?php

namespace App\Http\Controllers;

use App\Models\BankTransaction;
use Illuminate\Http\Request;

class bankTransactionController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "0";
        $tables = 'bank_transaction';
        $columns= \DB::getSchemaBuilder()->getColumnListing('bank_transaction');
        $rows = \DB::table('bank_transaction')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }


}
