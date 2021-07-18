<?php

namespace App\Http\Controllers;

use App\Models\SysInfoEmail;
use App\Models\SysInfoPhone;
use Illuminate\Http\Request;

class sysContactInfoController extends Controller
{
    public function index()
    {
        $pagename = "بيانات التواصل";
        $addNew = "إضافة ايميلات التواصل";
        $formPage = "new-email-form";
        $tables = 'contact_information';

        $qry = \DB::table('sys_info_email')
            ->select('sys_info_email.sys_email AS البريد الإلكتروني'
                ,'sys_info_email.state','sys_info_email.fakeId')
            ->get();
        $columns = ['البريد الإلكتروني','fakeId'];



        ///////////////////////
        ///
        $tables2 = 'contact_information';
        $addNew2 = "إضافة أرقام التواصل";
        $formPage2 = "new-phone-form";

        $qry2 = \DB::table('sys_info_phone')
            ->select('sys_info_phone.sys_phone_num AS الجوال', 'sys_info_phone.state' ,'sys_info_phone.fakeId')
            ->get();

        $columns2 = ['الجوال','fakeId'];

        return view('master_tables_view',['pagename' => $pagename , 'formPage' => $formPage])->with
        ('rows',$qry)->with('columns', $columns)->with('tables',$tables)->with
        ('addNew',$addNew)->with
        ('rows2',$qry2)->with('columns2', $columns2)->with('tables2',$tables2)->with
        ('addNew2',$addNew2)->with('formPage2',$formPage2);
    }

    public function delete($id)
    {
        $data = SysInfoEmail::where("fakeId","=","$id")->first();
        $data->delete();
        return redirect()->back();
    }

    public function delete2($id)
    {
        $data = SysInfoPhone::where("fakeId","=","$id")->first();
        $data->delete();
        return redirect()->back();
    }
    public function enableordisable($id)
    {
        $data = SysInfoEmail::where("fakeId","=","$id")->first();
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
    public function enableordisable2($id)
    {
        $data = SysInfoPhone::where("fakeId","=","$id")->first();
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

    public function insertData(){
        return view('new-email-form');
    }
    public function insertData2(){
        return view('new-phone-form');
    }
    function store(Request $request)
    {
        $email = new SysInfoEmail();
        $email->sys_email = $request->sys_email;
        $max = SysInfoEmail::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $email->fakeId = $maxFakeId;
        $email->save();
        return redirect('/contact_information');
    }
    function store2(Request $request)
    {
        $phone = new SysInfoPhone();
        $phone->sys_phone_num = $request->sys_phone_num;
        $max = SysInfoPhone::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $phone->fakeId = $maxFakeId;
        $phone->save();
        return redirect('/contact_information');
    }

    public function update(Request $request, SysInfoEmail $sysInfoEmail,$id)
    {
        $currentValues = SysInfoEmail::where("fakeId","=","$id")->first();

        return view('new-email-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }
    public function update2(Request $request, SysInfoPhone $sysInfoPhone,$id)
    {
        $currentValues = SysInfoPhone::where("fakeId","=","$id")->first();

        return view('new-phone-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }

    public function store_update(Request $request, $id){
        $data = SysInfoEmail::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/contact_information');
    }
    public function store_update2(Request $request, $id){
        $data = SysInfoPhone::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/contact_information');
    }
}
