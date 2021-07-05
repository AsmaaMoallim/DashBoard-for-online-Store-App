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
        return view('new-subSection-form', ['mainSections' => $mainSection]);
    }

    public function delete($id)
    {
        $data = SubSection::find($id);
        $data->delete();
        return redirect()->back();
    }


    function store(Request $request)
    {
        $sub_section = new SubSection();
        $sub_section->sub_id=11;
        $sub_section->sub_name = $request->sub_name;
        $sub_section->main_id = $request->main_id;
        $sub_section->medl_id = $request->medl_id;
        $sub_section->state = 1;
        $sub_section->fakeId =1;
        $sub_section->save();
        return redirect('/manager');
    }

}
