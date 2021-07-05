<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-client-form";
        $addNew = "إضافة عميل جديد";
        $showRecords = "0";
        $tables = 'clients';
        $columns= \DB::getSchemaBuilder()->getColumnListing('clients');
        $rows = \DB::table('clients')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableordisable($id)
    {
        $data = Client::find($id);
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
        $recordPage = "0";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "0";
        $tables = 'clients';
        $columns= DB::getSchemaBuilder()->getColumnListing('clients');
        $rows = DB::table('clients')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        return view('new-client-form');
    }

    public function delete($id)
    {
        $data = Client::find($id);
        $data->delete();
        return redirect()->back();
    }


    function store(Request $request)
    {
        $client= new Client();
        $client->cla_id=11;
        $client->cla_frist_name = $request->cla_frist_name;
        $client->cla_last_name = $request->cla_last_name;
        $client->cla_img = $request->cla_img;
        $client->cla_phone_num = $request->cla_phone_num;
        $client->cla_email = $request->cla_email;
        $client->state = 0;
        $client->fakeId =1;
        $client->save();
        return redirect('/');
    }
}
