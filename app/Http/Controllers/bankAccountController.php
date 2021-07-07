<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\SysBankAccount;
use Illuminate\Http\Request;

class bankAccountController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-bank-account-form";
        $addNew = "إضافة حساب بنكي جديد";
        $showRecords = "0";
        $tables = 'sys_bank_account';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sys_bank_account');
        $rows = \DB::table('sys_bank_account')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }



    public function enableOrdisable($id)
    {
        $data = SysBankAccount::find($id);
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


    public function delete($id)
    {
        $data = SysBankAccount::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        return view('new-bank-account-form');
    }

    function store(Request $request)
    {
        $sys_bank_account = new SysBankAccount();
        $sys_bank_account->sys_bank_id=90;
        $sys_bank_account->sys_bank_name = $request->sys_bank_name;
        $sys_bank_account->sys_bank_account_num = $request->sys_bank_account_num;
        $sys_bank_account->state = 1;
        $sys_bank_account->fakeId =1;
        $sys_bank_account->save();
        return redirect('/manager');
    }




}