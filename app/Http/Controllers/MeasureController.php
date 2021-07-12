<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = "دليل المقاسات";
        $formPage = "update-measures-form";
        $addNew = "تعديل المقاسات";
        $showRecords = "0";
        $tables = 'measure';
        $columns= \DB::getSchemaBuilder()->getColumnListing('measure');
        $rows = \DB::table('measure')->get();

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage);    }

    public function insertData(){
        return view('update-measures-form');
    }


    public function destroy($id)
    {

        $data = Measure::where("fakeId","=","$id")->first();;
        $data->delete();

        return redirect()->back();
    }

    public function enableOrdisable( $id)
    {

        $data = Measure::where("fakeId","=","$id")->first();;


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
