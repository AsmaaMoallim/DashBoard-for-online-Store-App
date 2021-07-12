<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Notification;

class notificationsController extends Controller
{
    public function index()
    {
        $pagename = "الاشعارات";
        $formPage = "new-notifications-form";
        $addNew = "إرسال إشعار جديد";
        $tables = 'notifications';
        $columns= \DB::getSchemaBuilder()->getColumnListing('notifications');
        $rows = \DB::table('notifications')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
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
        $maxFakeId =$max? $max->fakeId + 1 : 1;
        $notification->fakeId = $maxFakeId;
        $notification->save();
        return redirect('/home');
    }
}
