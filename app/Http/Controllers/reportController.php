<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        $pagename = "بلاغات التعليقات";

        $tables = 'report';
        $columns= \DB::getSchemaBuilder()->getColumnListing('report');
        $rows = \DB::table('report')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables);
    }

}
