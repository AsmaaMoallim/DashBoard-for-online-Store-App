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
        $columns= \DB::getSchemaBuilder()->getColumnListing('bank_transaction');
        $rows = \DB::table('bank_transaction')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables);
    }


}
