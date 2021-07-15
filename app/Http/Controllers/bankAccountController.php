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

        $qry =\DB::table('sys_bank_account')
            ->select('sys_bank_account.sys_bank_name AS اسم البنك',
                'sys_bank_account.sys_bank_account_num AS رقم الحساب', 'sys_bank_account.state','sys_bank_account.fakeId')
            ->get();

        $columns = ['اسم البنك','رقم الحساب','fakeId'];

       return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
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
        $data = SysBankAccount::where("fakeId","=","$id")->first();
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
        return redirect('/bank_accounts');
    }


    public function update(Request $request, SysBankAccount $sysBankAccount,$id)
    {
        $currentValues = SysBankAccount::where("fakeId","=","$id")->first();

        return view('new-bank-account-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id){
        $data = SysBankAccount::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/bank_accounts');
    }

    public function search(Request $request){
        $key = trim($request->get('search'));


        $pagename = "الحسابات البنكية";

        $formPage = "new-bank-account-form";
        $addNew = "إضافة حساب بنكي جديد";
        $tables = 'sys_bank_account';

        $qry =\DB::table('sys_bank_account')
            ->select('sys_bank_account.sys_bank_name AS اسم البنك',
                'sys_bank_account.sys_bank_account_num AS رقم الحساب', 'sys_bank_account.state','sys_bank_account.fakeId')
            ->Where('sys_bank_name', 'LIKE', "%{$key}%")
            ->orWhere('sys_bank_name', 'LIKE', "%{$key}%")
            ->get();

        $col = ['اسم البنك','رقم الحساب','fakeId'];

        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry =\DB::table('sys_bank_account')
                ->select('sys_bank_account.sys_bank_name AS اسم البنك',
                    'sys_bank_account.sys_bank_account_num AS رقم الحساب', 'sys_bank_account.state','sys_bank_account.fakeId')
                ->get();

            $col = ['اسم البنك','رقم الحساب','fakeId'];
            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry =\DB::table('sys_bank_account')
                ->select('sys_bank_account.sys_bank_name AS اسم البنك',
                    'sys_bank_account.sys_bank_account_num AS رقم الحساب', 'sys_bank_account.state','sys_bank_account.fakeId')
                ->get();

            $col = ['اسم البنك','رقم الحساب','fakeId'];
            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage)->with('key', $key);

    }


}
