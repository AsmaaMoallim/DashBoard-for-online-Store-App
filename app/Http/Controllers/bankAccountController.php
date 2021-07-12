<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\SysBankAccount;
use Illuminate\Http\Request;

class bankAccountController extends Controller
{
    public function index()
    {
        $pagename = "الحسابات البنكية";

        $formPage = "new-bank-account-form";
        $addNew = "إضافة حساب بنكي جديد";
        $tables = 'sys_bank_account';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sys_bank_account');
        $rows = \DB::table('sys_bank_account')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with

        $qry =\DB::table('sys_bank_account')
            ->select('sys_bank_account.sys_bank_name AS اسم البنك',
                'sys_bank_account.sys_bank_account_num AS رقم الحساب','sys_bank_account.fakeId')
            ->get();

        $columns = ['اسم البنك','رقم الحساب','fakeId'];

        return view('master_tables_view')->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }



    public function enableOrdisable($id)
    {
        $data = SysBankAccount::where("fakeId","=","$id")->first();;
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
        $data = SysBankAccount::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        return view('new-bank-account-form');
    }

    function store(Request $request)
    {
        $sys_bank_account = new SysBankAccount();
        $sys_bank_account->sys_bank_name = $request->sys_bank_name;
        $sys_bank_account->sys_bank_account_num = $request->sys_bank_account_num;
        $max = SysBankAccount::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId =$max? $max->fakeId + 1 : 1;
        $sys_bank_account->fakeId = $maxFakeId;
        $sys_bank_account->save();
        return redirect('/manager');
    }




}
