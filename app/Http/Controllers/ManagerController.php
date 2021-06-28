<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use http\Url;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = 'manager';
        $columns= \DB::getSchemaBuilder()->getColumnListing('manager');
        $rows = \DB::table('manager')->get();
        return view('master_tables_view')->with('rows',$rows)->with('columns', $columns)->with('tables',$tables);
    }

    public function destroy($id)
    {
       $data = Manager::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update($id)
    {
        $data = Manager::find($id);
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
