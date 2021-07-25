<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Manager;
use App\Models\NotifiSendTo;
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
        $noUpdateBtn = 1;
        $noDeleteBtn = 1;
//        \DB::raw("GROUP_CONCAT('\r\n' , permission.per_name, '\r\n' SEPARATOR ' //  ') AS الصلاحيات"
        $qry = \DB::table('notifications')
            ->join('manager','manager.man_id','=','notifications.man_id')
            ->join('notifi_send_to','notifi_send_to.notifi_id','=','notifications.notifi_id')
            ->join('clients','clients.cla_id','=','notifi_send_to.cla_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS 'المدير'"),
                \DB::raw("GROUP_CONCAT(CONCAT(cla_frist_name,'',  cla_last_name),'\r\n' SEPARATOR ' //  ') AS 'العملاء' "),
                'notifications.notifi_title AS عنوان الاشعار','notifications.notifi_content AS نص الاشعار','notifications.fakeId')
            ->groupBy('المدير', 'notifications.notifi_title', 'notifications.notifi_content','notifications.fakeId' )
            ->get();
        $columns = ['المدير','العملاء','عنوان الاشعار','نص الاشعار','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('noDeleteBtn', $noDeleteBtn)->with('noUpdateBtn', $noUpdateBtn)->with('formPage',$formPage);
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
        $notification->man_id = Manager::pluck('man_id')->first();
        $max = Notification::orderBy("fakeId", 'desc')->first();
        $maxFakeId =$max? $max->fakeId + 1 : 1;
        $notification->fakeId = $maxFakeId;
        $notification->man_id = Manager::pluck('man_id')->first();
        $notification->save();

        $cla_id = $request->input('cla_id');

        for ($x = 0; $x < sizeof($cla_id); $x++) {
            $notiSent = new NotifiSendTo();
            $notiSent->notifi_id = $notification->notifi_id;
            $max = NotifiSendTo::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeIdProdHas = $max? $max->fakeId + 1 : 1;
            $notiSent->fakeId = $maxFakeIdProdHas;
            $notiSent->cla_id = $cla_id;
            $notiSent->save();
        }

        return redirect('/notifications');
    }

    public function search(Request $request){
        $key = trim($request->get('search'));


        $pagename = "الاشعارات";
        $formPage = "new-notifications-form";
        $addNew = "إرسال إشعار جديد";
        $tables = 'notifications';
        $noUpdateBtn = 1;
        $noDeleteBtn = 1;

        $qry = \DB::table('notifications')
            ->join('manager','manager.man_id','=','notifications.man_id')
            ->join('notifi_send_to','notifi_send_to.notifi_id','=','notifications.notifi_id')
            ->join('clients','clients.cla_id','=','notifi_send_to.cla_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS 'اسم المدير'"),
                \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                'notifications.notifi_title AS عنوان الاشعار','notifications.notifi_content AS نص الاشعار',
                'notifications.fakeId')
            ->Where('man_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('man_last_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_last_name', 'LIKE', "%{$key}%")
            ->orWhere('notifications.notifi_title', 'LIKE', "%{$key}%")
            ->orWhere('notifications.notifi_content', 'LIKE', "%{$key}%")
            ->get();
        $col = ['اسم المدير','اسم العميل','عنوان الاشعار','نص الاشعار','fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('notifications')
                ->join('manager','manager.man_id','=','notifications.man_id')
                ->join('notifi_send_to','notifi_send_to.notifi_id','=','notifications.notifi_id')
                ->join('clients','clients.cla_id','=','notifi_send_to.cla_id')
                ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS 'اسم المدير'"),
                    \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                    'notifications.notifi_title AS عنوان الاشعار','notifications.notifi_content AS نص الاشعار','notifications.fakeId')
                ->get();
            $col = ['اسم المدير','اسم العميل','عنوان الاشعار','نص الاشعار','fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('notifications')
                ->join('manager','manager.man_id','=','notifications.man_id')
                ->join('notifi_send_to','notifi_send_to.notifi_id','=','notifications.notifi_id')
                ->join('clients','clients.cla_id','=','notifi_send_to.cla_id')
                ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS 'اسم المدير'"),
                    \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                    'notifications.notifi_title AS عنوان الاشعار','notifications.notifi_content AS نص الاشعار','notifications.fakeId')
                ->get();
            $col = ['اسم المدير','اسم العميل','عنوان الاشعار','نص الاشعار','fakeId'];

            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with('noDeleteBtn', $noDeleteBtn)->with('noUpdateBtn', $noUpdateBtn)->with
        ('formPage',$formPage)->with('key', $key);

    }

}
