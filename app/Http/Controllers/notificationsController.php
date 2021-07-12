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

        $qry = \DB::table('notifications')
            ->join('manager','manager.man_id','=','notifications.man_id')
            ->join('notifi_send_to','notifi_send_to.notifi_id','=','notifications.notifi_id')
            ->join('clients','clients.cla_id','=','notifi_send_to.cla_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS المدير"),
                \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS العميل"),
                'notifications.notifi_title AS عنوان الاشعار','notifications.notifi_content AS نص الاشعار','notifications.fakeId')
            ->get();
        $columns = ['المدير','العميل','عنوان الاشعار','نص الاشعار','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
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
