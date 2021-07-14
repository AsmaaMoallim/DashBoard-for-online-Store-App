<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailBoxController extends Controller
{
    public function index()
    {
        $pagename = "البريد ";

        $recordPage = "email_display";
        $showRecords = "عرض الرسالة";
        $tables = 'email_box';

        $qry = \DB::table('email_box')
            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
            ->join('sys_info_email','sys_info_email.sys_email_id','=','email_box.sys_email_id')

           -> select('sys_info_email.sys_email AS بريد النظام','email_box.email_type AS نوع البريد','email_box.email_cla_name AS اسم العميل',
               'email_box.email_cla_email AS بريد العميل','email_box.email_cla_phone AS جوال العميل','email_box.fakeId')
            ->get();

        $columns = ['بريد النظام','نوع البريد','اسم العميل','بريد العميل','جوال العميل','fakeId'];

        $rows = \DB::table('email_box')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with
        ('showRecords', $showRecords)->with('recordPage', $recordPage);
    }
}
