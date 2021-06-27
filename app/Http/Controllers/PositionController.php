<?php

namespace App\Http\Controllers;

use App\Models\Position;
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
        $tables = 'Position';
        $columns= \DB::getSchemaBuilder()->getColumnListing('position');
        $rows = \DB::table('position')->get();
        return view('master_tables_view')->with('rows',$rows)->with('columns', $columns)->with('tables',$tables);;
    }


    public function destroy($tables, $id)
    {

        $data = Position::find($id);
//        dd($data);

        $data->delete();
// or
//
//        Manager::where('id',$manager)->first();
//        $data->delete();

        return redirect()->route('position.index')
            ->with('success','deleted successfully!');
    }

    public function update( $tables, $id)
    {

        $data = Position::find($id);
//        dd($tables);
//        dd($id);
//        dd($data);

        if($data->state==false){
            $data->state=true;
            $data->save();
        }
        else{
//            dd($data->state);
            $data->state= false;
            $data->save();
        }
        return redirect()->route('position.index');


    }
}
