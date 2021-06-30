<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class socialMediaLinksController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-social-media-form";
        $addNew = "إضافة موقع تواصل إجتماعي جديد";
        $showRecords = "0";
        $tables = 'social_media_link';
        $columns= DB::getSchemaBuilder()->getColumnListing('social_media_link');
        $rows = DB::table('social_media_link')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        return view('new-social-media-form');
    }
}
