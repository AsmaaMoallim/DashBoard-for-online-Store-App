<?php

namespace App\Http\Controllers;

use App\Models\BankTransaction;
use Illuminate\Http\Request;

class bankTransactionController extends Controller
{
    public function index()
    {
        $pagename = "التحويلات البنكية";

        $tables = 'bank_transaction';


        $qry = \DB::table('bank_transaction')
            ->join('orders','bank_transaction.ord_id','=','orders.ord_id')
            ->join('clients','clients.cla_id','=','bank_transaction.cla_id')
            ->join('sys_bank_account','sys_bank_account.sys_bank_id','=','bank_transaction.sys_bank_id')

            ->select('bank_transaction.ord_id AS رقم الطلب',
                \DB::raw("CONCAT(cla_frist_name, ' ', cla_last_name) AS الاسم"),
            'bank_transaction.banktran_amount AS قيمة التحويل',
            'bank_transaction.banktran_img AS صورة التحويل',
            'bank_transaction.fakeId')
            ->get();

        $columns =['رقم الطلب','الاسم','قيمة التحويل','صورة التحويل','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables);
    }


}
