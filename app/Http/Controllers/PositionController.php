<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Position;
use http\Url;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordPage = "0";
        $showRecords = "0";
        $formPage = "new-role-form";
        $addNew = "إضافة منصب جديد";
        $tables = 'position';
        $columns= \DB::getSchemaBuilder()->getColumnListing('position');
        $rows = \DB::table('position')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }




    public function destroy($id)
    {
        $data = Position::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function enableOrdisable( $id)
    {

        $data = Position::find($id);

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
}
