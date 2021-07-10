<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Notification;

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
        return view('new-notifications-form', ['clients' => $client]);
    }

    function store(Request $request)
    {
        $notification = new Notification();
        $notification->notifi_title = $request->notifi_title;
        $notification->notifi_content = $request->notifi_content;
        $notification->man_id = $request->man_id;
        $max = Notification::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max->fakeId + 1;
        $notification->fakeId = $maxFakeId;
        $notification->save();
        return redirect('/home');
    }
}
