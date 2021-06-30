<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\SubSection;
use Illuminate\Http\Request;

class subSectionController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-subSection-form";
        $addNew = "إضافة قسم فرعي جديد";
        $showRecords = "0";
        $tables = 'sub_sections';
        $columns= \DB::getSchemaBuilder()->getColumnListing('sub_section');
        $rows = \DB::table('sub_section')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableordisable($id)
    {
        $data = SubSection::find($id);
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
        $mainSection = MainSection::all();
        return view('new-subSection-form', ['$mainSections' => $mainSection]);
    }

    public function delete($id)
    {
        $data = SubSection::find($id);
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
