<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class notificationsController extends Controller
{
    public function index()
    {
        $recordPage = "";
        $formPage = "new-notifications-form";
        $addNew = "إرسال إشعار جديد";
        $showRecords = "0";
        $tables = 'notifications';
        $columns= \DB::getSchemaBuilder()->getColumnListing('notifications');
        $rows = \DB::table('notifications')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        $client = Client::all();
        return view('new-notifications-form', ['client' => $client]);
    }
}
