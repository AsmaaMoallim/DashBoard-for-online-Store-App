<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\MediaLibrary;
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

        $qry = \DB::table('sub_section')
            ->join('media_library', 'sub_section.medl_id', '=', 'media_library.medl_id')
            ->join('main_sections','sub_section.main_id','=','main_sections.main_id')
            ->select('sub_name AS اسم القسم الفرعي' , 'medl_img_ved AS الصورة','main_name AS اسم القسم الرئيسي', 'sub_section.state','sub_section.fakeId')
            ->get();

        $columns= ['اسم القسم الفرعي','الصورة','اسم القسم الرئيسي','fakeId'];

        return view('master_tables_view')->with('rows',$qry)->with
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
        $sub_section->sub_name = $request->sub_name;
        $sub_section->main_id = $request->main_id;
        $sub_section->medl_id = $request->medl_id;
        $max = SubSection::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max->fakeId + 1;
        $sub_section->fakeId =$maxFakeId;
        $sub_section->save();
        return redirect('/manager');
    }

    public function update(Request $request, SubSection $subSection, $id)
    {
        $mainSection = MainSection::all();
        $currentValues = SubSection::find($id);
        $CurrentmainSection = MainSection::find($currentValues->main_id);
        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        return view('new-subSection-form',  ['CurrentmainSection' => $CurrentmainSection, 'mainSections' => $mainSection])->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues',$currentforeignValues);

    }
}
