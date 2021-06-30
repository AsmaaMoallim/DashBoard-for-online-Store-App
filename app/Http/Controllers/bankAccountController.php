<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bankAccountController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-bank-account-form";
        $addNew = "إضافة حساب بنكي جديد";
        $showRecords = "0";
        $tables = 'sys_bank_account';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sys_bank_account');
        $rows = \DB::table('sys_bank_account')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        return view('new-bank-account-form');
    }
}
