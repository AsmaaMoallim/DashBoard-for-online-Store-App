<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        $pagename = "العملاء";
        $formPage = "new-client-form";
        $addNew = "إضافة عميل جديد";
        $tables = 'clients';

        $qry = \DB::table('clients')
            ->select(\DB::raw("CONCAT(cla_frist_name, ' ',  cla_last_name) AS الاسم"),'cla_img AS الصورة الشخصية',
                'cla_phone_num AS رقم الجوال','cla_email AS البريد الالكتروني','clients.state','clients.fakeId')
            ->get();
        $columns= ['الاسم','الصورة الشخصية','رقم الجوال','البريد الالكتروني','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }

    public function enableordisable($id)
    {
        $data = Client::where("fakeId","=","$id")->first();;
        if($data->state==false){
            $data->state=true;
            $data->save();
        }
        else{
            $data->state= false;
            $data->save();
        }
        return redirect()->back();
    }
    public function contactinfo(){

        $tables = 'clients';
        $columns= DB::getSchemaBuilder()->getColumnListing('clients');
        $rows = DB::table('clients')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables);
    }

    public function insertData(){
        return view('new-client-form');
    }

    public function delete($id)
    {
        $data = Client::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }


    function store(Request $request)
    {
        $client= new Client();
        $client->cla_frist_name = $request->cla_frist_name;
        $client->cla_last_name = $request->cla_last_name;
        $client->cla_img = $request->cla_img;
        $client->cla_phone_num = $request->cla_phone_num;
        $client->cla_email = $request->cla_email;
        $max = Client::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $client->fakeId =$maxFakeId;
        $client->save();
        return redirect('/');
    }
}
