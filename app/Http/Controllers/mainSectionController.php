<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Model;
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
        $qry = \DB::table('main_sections')
            ->join('media_library','main_sections.medl_id','=','media_library.medl_id')
            ->select('main_name AS اسم القسم الرئيسي','medl_img_ved AS الصورة','main_sections.state','main_sections.fakeId')
            ->get();
        $columns = ['اسم القسم الرئيسي','الصورة','fakeId'];

        return view('master_tables_view')->with('rows',$qry)->with
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

    function store(Request $request)
    {
        $mainSection = new MainSection();
        $mainSection->main_id=11;
        $mainSection->main_name = $request->main_name;
        $mainSection->medl_id = $request->medl_id;
        $mainSection->state = 0;
        $mainSection->fakeId =1;
        $mainSection->save();
        return redirect('/manager');
    }

    public function update(Request $request, MainSection $mainSection, $id)
    {
        $currentValues = MainSection::find($id);

        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        return view('new-maninSection-form')->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues',$currentforeignValues);

    }

}
