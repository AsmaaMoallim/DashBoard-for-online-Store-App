<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "0";
        $tables = ' report';
        $columns= \DB::getSchemaBuilder()->getColumnListing(' report');
        $rows = \DB::table(' report')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

}
