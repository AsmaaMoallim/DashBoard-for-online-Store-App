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
        $tables = 'Manager';
        $columns= \DB::getSchemaBuilder()->getColumnListing('manager');
        $rows = \DB::table('manager')->get();
        return view('master_tables_view')->with('rows',$rows)->with('columns', $columns)->with('tables',$tables);
    }

    public function destroy($tables, $id)
    {

       $data = Manager::find($id);
//        dd($data);

        $data->delete();
// or
//
//        Manager::where('id',$manager)->first();
//        $data->delete();

        return redirect()->route('manager.index')
            ->with('success','deleted successfully!');
    }

    public function update( $tables, $id)
    {

        $data = Manager::find($id);
//        dd($tables);
//        dd($id);
//        dd($data);
//            dd($data->state);

        if($data->state==false){
            $data->state=true;
            $data->save();
        }
        else{
//            dd($data->state);
            $data->state= false;
            $data->save();
        }
        return redirect()->route('manager.index');


    }
}
