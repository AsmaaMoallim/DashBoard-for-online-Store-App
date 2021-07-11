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
        $recordPage = "0";
        $formPage = "update-measures-form";
        $addNew = "تعديل المقاسات";
        $showRecords = "0";
        $tables = 'measure';

        $qry = \DB::table('measure')
            ->select('mesu_value AS المقاسات','measure.fakeId')
        ->get();

        $columns = ['المقاسات','fakeId'];

        return view('master_tables_view')->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);    }

    public function insertData(){
        return view('update-measures-form');
    }


    public function destroy($id)
    {
        $data = Measure::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function enableOrdisable( $id)
    {

        $data = Measure::find($id);


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
