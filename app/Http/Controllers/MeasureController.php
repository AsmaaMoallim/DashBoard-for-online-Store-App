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
        $tables = 'measure';
        $columns= \DB::getSchemaBuilder()->getColumnListing('measure');
        $rows = \DB::table('measure')->get();
        return view('master_tables_view')->with('rows',$rows)->with('columns', $columns)->with('tables',$tables);;
    }


    public function destroy($id)
    {
        $data = Measure::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update( $id)
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

}
