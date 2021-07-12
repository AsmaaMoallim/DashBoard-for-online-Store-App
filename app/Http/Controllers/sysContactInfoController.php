<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sysContactInfoController extends Controller
{
    public function index()
    {
        $pagename = "بيانات التواصل";
        $recordPage = "contact_info";
        $showRecords = "إضافة أرقام التواصل";
        $tables = 'sys_info_phone';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sys_info_phone');
        $rows = \DB::table('sys_info_phone')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage);
    }
}
