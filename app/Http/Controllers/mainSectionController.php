<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use Illuminate\Http\Request;

class mainSectionController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-maninSection-form";
        $addNew = "إضافة قسم رئيسي جديد";
        $showRecords = "0";
        $tables = 'main_sections';
        $columns= \DB::getSchemaBuilder()->getColumnListing('main_sections');
        $rows = \DB::table('main_sections')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        return view('new-maninSection-form');
    }

    public function enableordisable($id)
    {
        $data = MainSection::find($id);
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
        $data = MainSection::find($id);
        $data->delete();
        return redirect()->back();
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
