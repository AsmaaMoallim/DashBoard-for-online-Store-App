<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailBoxController extends Controller
{
    public function index()
    {
        $pagename = "البريد ";

        $recordPage = "email_display";
        $showRecords = "عرض الرسالة";
        $tables = 'email_box';
        $columns = \DB::getSchemaBuilder()->getColumnListing('email_box');
        $rows = \DB::table('email_box')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows', $rows)->with
        ('columns', $columns)->with('tables', $tables)->with
        ('showRecords', $showRecords)->with('recordPage', $recordPage);
    }
}
