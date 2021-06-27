<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use http\Url;
use Illuminate\Http\Request;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns= \DB::getSchemaBuilder()->getColumnListing('manager');
        $rows = \DB::table('manager')->get();
        return view('man')->with('rows',$rows)->with('columns', $columns);
    }

    public function destroy($id)
    {

       $data = Manager::find($id);
        $data->delete();
// or
//
//        Manager::where('id',$manager)->first();
//        $data->delete();

        return redirect()->route('main.index')
            ->with('success','deleted successfully!');
    }

    public function update(Request $request, Manager $manager,$id)
    {

        $data = (Manager::find($id));
        if($data->state==0){
//            dd($data->state);
            $data->state=1;
            $data->save();
        }
        else{
//            dd($data->state);

            $data->state= 0;
            $data->save();
        }
        return redirect()->route('main.index');


    }
}
