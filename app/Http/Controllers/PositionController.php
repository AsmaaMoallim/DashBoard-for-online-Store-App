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

    public function insertData(){
        $permission = Permission::all();
        return view('new-role-form', ['permissions' => $permission]);
    }

        function store(Request $request)
    {
        $position = new Position();
        $position->pos_id = $request->pos_id;
        $position->pos_name = $request->pos_name;
        $position->save();
        return redirect('/position');
   }


    public function destroy($id)
    {
        $data = Position::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update( $id)
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
