<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bannerController extends Controller
{

    public function index()
    {
        $recordPage = "0";
        $formPage = "new-banner-form";
        $addNew = "إضافة بانر جديد";
        $showRecords = "0";
        $tables = 'banner';
        $columns= DB::getSchemaBuilder()->getColumnListing('banner');
        $rows = DB::table('banner')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    //    function addNew(Request $request)
//    {
//        $manager = new Manager;
//        $manager->ManagerName = $request->ManagerName;
//        $manager->ManagerEmail = $request->ManagerEmail;
//        $manager->ManagerPhone = $request->ManagerPhone;
//        $manager->ManagerRole = $request->ManagerRole;
//        $manager->ManagerPassword = $request->ManagerPassword;
//      $manager->save();
//        return redirect('/home');
//   }
}
