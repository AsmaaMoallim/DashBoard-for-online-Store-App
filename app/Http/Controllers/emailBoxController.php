<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailBoxController extends Controller
{
    public function index()
    {
        $recordPage = "email_display";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "عرض الرسالة";
        $tables = 'email_box';
        $columns= DB::getSchemaBuilder()->getColumnListing('email_box');
        $rows = DB::table('email_box')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }
}
