<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sysContactInfoController extends Controller
{
    public function index()
    {
        $recordPage = "contact_info";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "إضافة أرقام التواصل";
        $tables = 'sys_info_phone';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sys_info_phone');
        $rows = \DB::table('sys_info_phone')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }
}
